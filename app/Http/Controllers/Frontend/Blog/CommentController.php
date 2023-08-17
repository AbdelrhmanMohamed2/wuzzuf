<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Models\Admin\Comment;

class CommentController extends Controller
{
    public function store(Post $post, StoreCommentRequest $request)
    {
        Comment::create($request->validated());
        toast('Comment submitted successfully', 'success');
        return redirect()->back();
    }

    public function update(Post $post, Comment $comment, UpdateCommentRequest $request)
    {
        $comment->update($request->validated());
        toast('Comment updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        toast('Comment deleted successfully', 'success');
        return redirect()->back();
    }
}
