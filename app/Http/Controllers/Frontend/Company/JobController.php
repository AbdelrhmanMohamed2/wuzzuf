<?php

namespace App\Http\Controllers\Frontend\Company;

use Illuminate\Http\Request;
use App\Models\Admin\JobType;
use App\Models\Admin\Location;
use App\Models\Admin\CareerLevel;
use App\Models\Admin\JobCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Job\StoreJobRequest;
use App\Models\Admin\Job;
use App\Models\Admin\Language;
use App\Models\Admin\Skill;

class JobController extends Controller
{
    public function index()
    {
        $jobs = auth()->user()->company->jobs;
        $jobs->load(['job_type', 'location.city.country', 'company']);
        return view('front_end.company.job.index', compact('jobs'));
    }

    public function create()
    {
        $countries = Location::where('type', 'country')->get();
        $job_types = JobType::get();
        $career_levels = CareerLevel::get();
        $job_categories = JobCategory::get();

        return view('front_end.company.job.create', compact('job_types', 'career_levels', 'job_categories', 'countries'));
    }

    public function store(StoreJobRequest $request)
    {
        $languages_ids = [];
        $skills_ids = [];
        foreach ($request->skills as $skill_name) {
            $skill = Skill::where('name', $skill_name)->first();
            if (!$skill) {
                $skill = Skill::create(['name' => $skill_name]);
            }

            if (!in_array($skill_name, $skills_ids)) {
                $skills_ids[] = $skill->id;
            }
        }

        foreach ($request->languages as $language_name) {
            $language = Language::where('name', $language_name)->first();
            if (!$language) {
                $language = Language::create(['name' => $language_name]);
            }

            if (!in_array($language_name, $languages_ids)) {
                $languages_ids[] = $language->id;
            }
        }

        $job = auth()->user()->company->jobs()->create(['location_id' => $request->input('area_id')] + $request->validated());
        $job->skills()->attach($skills_ids);
        $job->languages()->attach($languages_ids);

        toast('Job created successfully', 'success');
        return redirect()->back();
    }

    public function edit(Job $job)
    {
        $job->load(['location.city.country', 'skills', 'languages']);

        $countries = Location::where('type', 'country')->get();
        $city =  $job->location->city;
        $cities = $city->country->cities;
        $areas =  $city->areas;


        $job_types = JobType::get();
        $career_levels = CareerLevel::get();
        $job_categories = JobCategory::get();

        return view('front_end.company.job.edit', compact(
            'job',
            'job_types',
            'career_levels',
            'job_categories',
            'countries',
            'cities',
            'areas',

        ));
    }

    public function update(Job $job, StoreJobRequest $request)
    {
        $languages_ids = [];
        $skills_ids = [];
        foreach ($request->skills as $skill_name) {
            $skill = Skill::where('name', $skill_name)->first();
            if (!$skill) {
                $skill = Skill::create(['name' => $skill_name]);
            }

            if (!in_array($skill_name, $skills_ids)) {
                $skills_ids[] = $skill->id;
            }
        }

        foreach ($request->languages as $language_name) {
            $language = Language::where('name', $language_name)->first();
            if (!$language) {
                $language = Language::create(['name' => $language_name]);
            }

            if (!in_array($language_name, $languages_ids)) {
                $languages_ids[] = $language->id;
            }
        }

        $job->update(['location_id' => $request->input('area_id')] + $request->validated());

        $job->skills()->detach();
        $job->languages()->detach();

        $job->skills()->attach($skills_ids);
        $job->languages()->attach($languages_ids);

        toast('Job updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy(Job $job)
    {
        $job->delete();
        toast('Job deleted successfully', 'success');
        return redirect()->back();
    }
}
