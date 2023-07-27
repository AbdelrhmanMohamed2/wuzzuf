<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Experience;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $perPage = 4;

    const UPLOADED_CV = 'uploads/employees/cvs/';

    const ROLES = [
        'title' => 'required|string|min:2|max:200',
        'gender' => 'required|in:male,female',
        'birth_date' => 'required|date_format:Y-m-d',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'cv_file',
        'gender',
        'birth_date'
    ];

    public function age() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($this->birth_date)->age,
        );
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function education()
    {
        return $this->hasOne(Education::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'employee_skills');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'employee_languages');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    // public function getJobsWithCommonSkills()
    // {
    //     $skills = $this->skills->pluck('id');
    //     $jobs = Job::whereHas('skills', function ($query) use ($skills) {
    //         $query->whereIn('skills.id', $skills);
    //     })->get();

    //     return $jobs;
    // }

    public function getJobsWithCommonSkills()
    {
        $skills = $this->skills->pluck('id');

        $jobs = Job::selectRaw('jobs.*, COUNT(*) as common_skills_count')
            ->join('job_skill', 'job_skill.job_id', '=', 'jobs.id')
            ->whereIn('job_skill.skill_id', $skills)
            ->groupBy('jobs.id')
            ->orderByRaw('common_skills_count DESC')
            ->get();

        return $jobs;
    }
    //     public function getJobsWithCommonSkills()
    // {
    //     $skills = $this->skills->pluck('id');

    //     $jobs = Job::selectRaw('jobs.*, COUNT(*) as common_skills_count')
    //                 ->join('job_skill', 'job_skill.job_id', '=', 'jobs.id')
    //                 ->whereIn('job_skill.skill_id', $skills)
    //                 ->groupBy('jobs.id')
    //                 ->orderByRaw('common_skills_count DESC')
    //                 ->get();

    //     return $jobs;
    // }



    // public function getJobsWithCommonSkills()
    // {
    //     $skills = $this->skills->pluck('id');
    //     $jobs = Job::whereHas('skills', function ($query) use ($skills) {
    //         $query->whereIn('skills.id', $skills);

    //         // Sort the jobs by the number of skills they have in common with the employee.
    //         $query->orderBy(DB::raw('COUNT(skills.id)'), 'desc');
    //     });

    //     return $jobs;
    // }
}
