<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    const ROLES = [
        'name' => 'required|string|min:2|max:200|unique:job_categories,name',
        'industry_id' => 'required|exists:industries,id',
    ];

    protected $fillable = [
        'name',
        'industry_id',
    ];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
