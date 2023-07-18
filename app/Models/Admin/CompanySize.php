<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySize extends Model
{
    use HasFactory;

    const ROLES = [
        'range_of_employees' => 'required|string|min:3|max:200',
        'name' => 'required|string|min:3|max:200|unique:company_sizes,name',
    ];
    protected $fillable = [
        'name',
        'range_of_employees',
    ];

    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
