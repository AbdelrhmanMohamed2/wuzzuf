<?php

namespace App\Models\Admin;

use App\Rules\AllowedHtmlTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const UPLOADED_IMAGE = 'uploads/images/posts/';
    protected $perPage = 10;

    public static function roles()
    {
        return [
            'body'  => 'required|string|min:3|allowed_tags[h1,h2,h3,p]',
            'body'  => ['required', 'string', 'min:3', new AllowedHtmlTags(['h1', 'h2', 'h3', 'p'])],
            'reading_time' => 'required|integer|min:1|max:999',
            'post_category_id' => 'required|exists:post_categories,id',
        ];
    }

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
