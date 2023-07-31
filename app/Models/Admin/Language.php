<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $perPage = 5;

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
