<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Job;
use App\Models\Admin\Company;
use App\Models\Admin\JobType;
use App\Models\Admin\CareerLevel;
use App\Models\Admin\JobCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use App\Models\Admin\Location;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::with('company')->paginate();
        $career_levels = CareerLevel::get();
        $job_types = JobType::get();
        $job_categories = JobCategory::get();
        $countries = Location::where('type', 'country')->get();
        return view('dashboard.pages.job.index', compact(
            'jobs',
            'career_levels',
            'job_types',
            'job_categories',
            'countries',
        ));
    }

    public function companyJobs(Company $company)
    {
        $company->load(['jobs']);
        return view('dashboard.pages.job.company_jobs', compact('company'));
    }

    public function show(Company $company, Job $job)
    {
        $job->load(['job_type', 'career_level', 'job_category', 'skills', 'languages', 'location.city.country']);
        $company->load(['location.city.country']);
        return view('dashboard.pages.job.show', compact('company', 'job'));
    }
}
