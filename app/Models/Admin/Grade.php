<?php

namespace App\Models\Admin;

use App\Models\Admin\Employee;
use App\Models\Admin\Education;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    protected $perPage = 5;

    protected $fillable = [
        'name'
    ];

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function employees()
    {
        return $this->hasManyThrough(Employee::class, Education::class);
    }
}
