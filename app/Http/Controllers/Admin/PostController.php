<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Admin\PostCategory;
use App\Traits\UploadFile;

class PostController extends Controller
{
    use UploadFile;

    public function index()
    {
        $posts = Post::paginate();
        return view('dashboard.pages.post.index', compact('posts'));
    }

    public function create()
    {
        $post_categories = PostCategory::get();
        return view('dashboard.pages.post.create', compact('post_categories'));
    }

    public function store(StorePostRequest $request)
    {
        $image = $this->uploadFile(Post::UPLOADED_IMAGE, $request->image);
        Post::create(['image' => $image] + $request->validated());
        toast('Post created successfully', 'success');
        return redirect()->back();
    }

    public function show(Post $post)
    {
        $post->load(['admin.user', 'post_category', 'comments.user']);
        // dd($post->comments);
        return view('dashboard.pages.post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $post_categories = PostCategory::get();
        return view('dashboard.pages.post.edit', compact('post_categories', 'post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        $image = $request->has('image') ? $this->uploadFile(Post::UPLOADED_IMAGE, $request->image, $post->image) : $post->image;

        $post->update(['image' => $image] + $request->validated());
        toast('Post updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $this->removeFile($post::UPLOADED_IMAGE, $post->image);
        $post->delete();
        toast('Post has been deleted successfully', 'success');
        return redirect()->back();
    }
}
