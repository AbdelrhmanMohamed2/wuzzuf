<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $perPage = 5;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts ()
    {
        return $this->hasMany(Post::class);
    }
}
