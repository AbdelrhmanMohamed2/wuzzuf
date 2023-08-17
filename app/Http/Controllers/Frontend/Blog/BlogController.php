<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->withCount('comments')->paginate();
        return view('front_end.blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $post->load(['comments.user', 'admin.user', 'post_category']);
        return view('front_end.blog.show', compact('post'));
    }
}
