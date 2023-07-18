<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    const ROLES = [
        'name' => 'required|string|min:3|max:200|unique:post_categories',
        'parent_id' => 'required|exists:post_categories,id',
    ];

    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function main_category()
    {
        return $this->hasMany(PostCategory::class, 'parent_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(PostCategory::class, 'id');
    }


}
