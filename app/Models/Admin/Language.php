<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    const ROLES = [
        'name' => 'required|string|min:2|max:200|unique:languages,name',
    ];

    protected $fillable = [
        'name',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_languages');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
