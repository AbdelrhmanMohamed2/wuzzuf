<?php

namespace App\Models\Admin;

use App\Models\Admin\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CareerLevel extends Model
{
    use HasFactory;

    const ROLES = [
        'name' => 'required|string|min:2|max:200|unique:career_levels,name',
    ];

    protected $fillable = [
        'name'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
