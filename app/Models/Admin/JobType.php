<?php

namespace App\Models\Admin;

use App\Models\Admin\Experience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobType extends Model
{
    use HasFactory;

    protected $perPage = 5;


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
