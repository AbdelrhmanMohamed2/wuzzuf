<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use App\Models\Admin\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;



class CommentController extends Controller
{
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();
        toast('comment deleted successfully', 'success');
        return redirect()->back();
    }
}
