<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\JobCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobCategory\StoreJobCategoryRequest;
use App\Http\Requests\JobCategory\UpdateJobCategoryRequest;
use App\Models\Admin\Industry;

class JobCategoryController extends Controller
{
    public function index()
    {
        $job_categories = JobCategory::with('industry')->paginate();
        return view('dashboard.pages.job_category.index', compact('job_categories'));
    }

    public function create()
    {
        $industries = Industry::get(['id', 'name']);
        return view('dashboard.pages.job_category.create', compact('industries'));
    }

    public function store(StoreJobCategoryRequest $request)
    {
        JobCategory::create($request->validated());
        toast('Job Category has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(JobCategory $jobCategory)
    {
        $industries = Industry::get(['id', 'name']);
        return view('dashboard.pages.job_category.edit', compact('jobCategory', 'industries'));
    }

    public function update(UpdateJobCategoryRequest $request, JobCategory $jobCategory)
    {
        $jobCategory->update($request->validated());
        toast('Job Category has been updated successfully', 'success');
        return redirect()->back();    }

    public function destroy(JobCategory $jobCategory)
    {
        try {
            $jobCategory->delete();
            toast('Job Category has been deleted successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast('You cant delete Job Category', 'error');
            return redirect()->back();
        }
    }
}
