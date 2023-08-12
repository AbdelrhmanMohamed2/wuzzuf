<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Job;
use Illuminate\Http\Request;

class ApplyJobController extends Controller
{
    public function index()
    {
        $jobs = auth()->user()->employee->jobs;
        return view('front_end.profile.jobs', compact('jobs'));
    }

    public function apply(Job $job)
    {
        $jobs = auth()->user()->employee->jobs;
        if ($jobs->where('id', $job->id)->first()) {
            toast('You Already Have been applied to this job before', 'error');
        } else {
            auth()->user()->employee->jobs()->attach($job);
            toast('You have been applied to this job successfully, wait for email from the company for any updates', 'success');
        }
        return redirect()->back();
    }

    public function cancel(Job $job)
    {
        $jobs = auth()->user()->employee->jobs;
        if ($jobs->where('id', $job->id)->first()) {
            auth()->user()->employee->jobs()->detach($job);
            toast('You Cancel this job application', 'success');
        } else {
            toast('You are not applied to this job before', 'error');
        }
        return redirect()->back();
    }
}
