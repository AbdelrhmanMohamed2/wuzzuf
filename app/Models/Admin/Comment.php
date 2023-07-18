<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    const ROLES = [
        'user_id' => 'required|exists:users,id',
        'post_id' => 'required|exists:posts,id',
        'body' => 'required|string|min:3',
    ];

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
