<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const UPLOADED_IMAGE = 'uploads/images/posts/';

    const ROLES = [
        'title' => 'required|string|min:3|max:200|unique:posts,title',
        'body'  => 'required|string|min:3',
        'image' => 'required|file|image|mimes:jpeg,png,jpg',
        'reading_time' => 'required|integer|min:1|max:999',
        'post_category_id' => 'required|exists:post_categories,id',
        'admin_id' => 'required|exists:admins,id',
    ];
    protected $fillable = [
        'admin_id',
        'title',
        'body',
        'image',
        'reading_time',
        'post_category_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function post_category()
    {
        return $this->belongsTo(PostCategory::class);
    }
}
