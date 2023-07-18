<?php

namespace App\Models\Admin;

use App\Models\Admin\Experience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobType extends Model
{
    use HasFactory;

    const ROLES = [
        'name' => 'required|string|min:2|max:200|unique:job_types,name',
    ];

    protected $fillable = [
        'name'
    ];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
