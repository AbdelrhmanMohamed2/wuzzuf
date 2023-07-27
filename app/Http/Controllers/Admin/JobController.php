<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Job;
use App\Models\Admin\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;


class JobController extends Controller
{

    public function index(Company $company)
    {
        $company->load(['jobs']);
        return view('dashboard.pages.job.index', compact('company'));
    }

    public function show(Company $company, Job $job)
    {
        $job->load(['job_type', 'career_level', 'job_category']);
        $company->load(['location.city.country']);
        return view('dashboard.pages.job.show', compact('company', 'job'));
    }
}
