<?php

namespace App\Models\Admin;

use App\Models\Admin\Employee;
use App\Models\Admin\Education;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class University extends Model
{
    use HasFactory;

    const ROLES = [
        'name' => 'required|string|min:3|max:200|unique:universities,name'
    ];

    protected $fillable = [
        'name',
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
