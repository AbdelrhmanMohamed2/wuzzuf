<?php

namespace App\Http\Controllers\Frontend\Employee;

use Illuminate\Http\Request;
use App\Models\Admin\JobType;
use App\Models\Admin\Experience;
use App\Models\Admin\JobCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Experience\StoreExperienceRequest;
use App\Http\Requests\Experience\UpdateExperienceRequest;

class EmployeeExperienceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $experiences = $user->employee->experiences;
        return view('front_end.profile.experience.index', compact('experiences', 'user'));
    }

    public function create()
    {
        $user = auth()->user();
        $job_categories = JobCategory::get();
        $job_types = JobType::get();
        return view('front_end.profile.experience.create', compact('job_types', 'job_categories', 'user'));
    }

    public function store(StoreExperienceRequest $request)
    {
        auth()->user()->employee->experiences()->create($request->validated());
        toast('You have Added Experience successfully', 'success');
        return redirect()->back();
    }

    public function edit(Experience $experience)
    {
        $user = auth()->user();
        $job_categories = JobCategory::get();
        $job_types = JobType::get();
        return view('front_end.profile.experience.edit', compact('experience', 'job_types', 'job_categories', 'user'));
    }

    public function update(UpdateExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->validated());
        toast('You have Updated Experience successfully', 'success');
        return redirect()->back();
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        toast('You have removed Experience successfully', 'success');
        return redirect()->back();
    }
}
