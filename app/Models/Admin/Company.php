<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\Job;
use App\Models\Admin\Industry;
use App\Models\Admin\CompanyRole;
use App\Models\Admin\CompanySize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    const ROLES = [
        'user_id' => 'required|exists:users,id',
        'name' => 'required|string|min:2|max:200|unique:companies,name',
        'website' => ['required', 'regex:/^((http[s]?:\/\/)?(www\.)?([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,})(\/\S*)?$/', 'unique:companies,website'],
        'description' => 'required|string|min:8',
        'founded_at'=> 'required|date_format:Y-m-d',
        'company_size_id' => 'required|exists:company_sizes,id',
        'industry_id' => 'required|exists:industries,id',
        'location_id' => 'required|exists:locations,id',
     ];

    protected $fillable = [
        'user_id',
        'name',
        'website',
        'description',
        'founded_at',
        'company_size_id',
        'industry_id',
        'location_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company_size()
    {
        return $this->belongsTo(CompanySize::class);
    }

    public function company_roles ()
    {
        return $this->belongsToMany(CompanyRole::class, 'company_company_role');
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
