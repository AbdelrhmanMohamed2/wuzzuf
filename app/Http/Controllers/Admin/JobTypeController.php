<?php
namespace App\Http\Controllers\Admin;

use App\Models\Admin\JobType;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobType\StoreJobTypeRequest;
use App\Http\Requests\JobType\UpdateJobTypeRequest;


class JobTypeController extends Controller
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
    public function store(StoreJobTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobType $jobType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobType $jobType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobTypeRequest $request, JobType $jobType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobType $jobType)
    {
        //
    }
}
