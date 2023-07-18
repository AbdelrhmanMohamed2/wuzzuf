<?php

namespace App\Models\Admin;

use App\Models\Admin\JobCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;
    const ROLES = [
        'name' => 'required|string|min:2|max:200|unique:industries,name',
    ];

    protected $fillable = [
        'name',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function job_categories()
    {
        return $this->hasMany(JobCategory::class);
    }
}
