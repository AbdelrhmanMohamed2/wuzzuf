<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRole extends Model
{
    use HasFactory;

    const ROLES = [
        'name' => 'required|string|min:3|max:200',
    ];

    protected $fillable = [
        'name'
    ];

    public function companies ()
    {
        return $this->belongsToMany(Company::class, 'company_company_role');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'company_roles_skills');
    }
}
