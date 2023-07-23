<?php

namespace App\Models\Admin;

use App\Models\Admin\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    const ROLES = [
        'name' => 'required|string|min:2|max:200|unique:skills,name',
    ];

    protected $fillable = [
        'name'
    ];

    public function company_roles()
    {
        return $this->belongsToMany(CompanyRole::class, 'company_roles_skills');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_skills');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skill');
    }
}
