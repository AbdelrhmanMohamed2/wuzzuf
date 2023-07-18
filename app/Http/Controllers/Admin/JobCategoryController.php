<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\JobCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobCategory\StoreJobCategoryRequest;
use App\Http\Requests\JobCategory\UpdateJobCategoryRequest;



class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobCategory $jobCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobCategory $jobCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobCategoryRequest $request, JobCategory $jobCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobCategory $jobCategory)
    {
        //
    }
}
