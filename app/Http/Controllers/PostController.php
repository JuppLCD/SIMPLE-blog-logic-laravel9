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

        return view('posts.show', compact('post'));
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
