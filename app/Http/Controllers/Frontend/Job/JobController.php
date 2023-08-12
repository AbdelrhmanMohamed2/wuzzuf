<?php

namespace App\Http\Controllers\Frontend\Job;

use Exception;
use App\Models\Admin\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function show(Job $job)
    {
        $job->load(
            [
                'job_type',
                'career_level',
                'job_category',
                'skills',
                'languages',
                'location.city.country',
                'company.user',
                'company.location.city.country'
            ]
        );
        $applied_before = false;

        if (auth()->user()->IsEmployee()) {
            $applied_before = auth()->user()->employee->jobs->where('id', $job->id)->first() ? true : false;
        }

        return view('front_end.job.show', compact('job', 'applied_before'));
    }
}
