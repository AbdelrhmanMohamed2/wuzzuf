<?php

namespace App\Models\Admin;

use App\Models\Admin\Language;
use App\Models\Admin\CareerLevel;
use App\Models\Admin\JobCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    protected $perPage = 10;

    const ROLES = [
        'title' => 'required|string|max:255|min:2',
        'description' => 'required|string|min:2',
        'requirements' => 'required|string|min:2',
        'opened_positions' => 'required|integer|min:1',
        'years_of_experience' => 'required|integer|min:0',
        'salary' => 'required|numeric|min:1',
        'job_category_id' => 'required|exists:job_categories,id',
        'job_type_id' => 'required|exists:job_types,id',
        'career_level_id' => 'required|exists:career_levels,id',
        'country_id' => 'required|exists:locations,id,type,country',
        'city_id' => 'required|exists:locations,id,type,city',
        'area_id' => 'required|exists:locations,id,type,area',

        'skills' => 'required|array|min:1',
        'skills.*' => 'string',
        'languages' => 'required|array|min:1',
        'languages.*' => 'string',
    ];

    protected $fillable = [
        'location_id',
        'title',
        'description',
        'requirements',
        'opened_positions',
        'years_of_experience',
        'salary',
        'job_category_id',
        'job_type_id',
        'career_level_id',
        'location_id',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function job_type()
    {
        return $this->belongsTo(JobType::class);
    }

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function career_level()
    {
        return $this->belongsTo(CareerLevel::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class)->withPivot('status');
    }
}
