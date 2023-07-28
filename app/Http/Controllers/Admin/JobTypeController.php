<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\JobType;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobType\StoreJobTypeRequest;
use App\Http\Requests\JobType\UpdateJobTypeRequest;


class JobTypeController extends Controller
{
    public function index()
    {
        $job_types = JobType::paginate();
        return view('dashboard.pages.job_type.index', compact('job_types'));
    }

    public function create()
    {
        return view('dashboard.pages.job_type.create');
    }

    public function store(StoreJobTypeRequest $request)
    {
        JobType::create($request->validated());
        toast('Job Type has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(JobType $jobType)
    {
        return view('dashboard.pages.job_type.edit', compact('jobType'));
    }

    public function update(UpdateJobTypeRequest $request, JobType $jobType)
    {
        $jobType->update($request->validated());
        toast('Job Type has been updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy(JobType $jobType)
    {
        try {
            $jobType->delete();
            toast('Job Type has been deleted successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast('You cant delete Job Type', 'error');
            return redirect()->back();
        }
    }
}
