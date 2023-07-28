<?php

namespace App\Models\Admin;

use App\Models\Admin\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CareerLevel extends Model
{
    use HasFactory;

    protected $perPage= 5;

    protected $fillable = [
        'name'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}
