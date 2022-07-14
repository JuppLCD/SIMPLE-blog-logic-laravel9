<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;

use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        if (auth()->user()->role->name === 'Admin' || auth()->user()->role->name === 'Moderator') {
            $posts = Post::latest('id')->paginate(15);
        } else {
            $posts = Post::where('user_id', auth()->user()->id)->latest('id')->paginate(15);
        }

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request)
    {
        $newPost = array_merge($request->all(), ['user_id' => auth()->user()->id]);

        $post = Post::create($newPost);

        if ($request->file('image')) {
            $url = Storage::put('public/images', $request->file('image'));
            $post->image()->create(['url' => $url]);
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
        $post->save();
        return view('admin.posts.show', compact('post'));
    }

    public function show(Post $post)
    {
        $this->authorize('author', $post);
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        $tagsInPost = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'tagsInPost'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        if ($request->file('image')) {
            $url = Storage::put('public/images', $request->file('image'));

            if ($post->image) {
                Storage::delete($post->image->url);
                $post->image->update(['url' => $url]);
            } else {
                $post->image()->create(['url' => $url]);
            }
        }

        $post->update($request->all());
        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.edit', $post)->with('success', 'Post is successfully edited');
    }

    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        if ($post->image) {
            Storage::delete($post->image->url);
        }
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post is successfully deleted');
    }

    public function myPosts()
    {
        $posts = Post::where('user_id', auth()->user()->id)->latest('id')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }
}
