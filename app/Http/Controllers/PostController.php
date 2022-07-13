<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 2)->latest('id')->paginate(8);

        return view('home', compact('posts'));
    }

    public function show(Post $post)
    {
        $this->authorize('published', $post);

        $similares = Post::where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();
        return view('posts.show', compact('post', 'similares'));
    }

    public function byCategory(Category $category)
    {
        $posts = $category->posts()->where('status', 2)->latest('id')->paginate(8);
        return view('posts.category', compact('posts', 'category'));
    }

    public function byTag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(8);
        return view('posts.tag', compact('posts', 'tag'));
    }
}
