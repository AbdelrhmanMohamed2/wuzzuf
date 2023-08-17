<?php

namespace App\Http\Controllers\Frontend\Job;

use Exception;
use App\Models\Admin\Job;
use Illuminate\Http\Request;
use App\Models\Admin\JobType;
use App\Models\Admin\Industry;
use App\Models\Admin\Location;
use App\Models\Admin\CareerLevel;
use App\Models\Admin\JobCategory;
use App\Http\Controllers\Controller;

class JobController extends Controller
{

    public function index(Request $request)
    {
        $jobs = $this->filteredJobs($request);

        $job_categories = JobCategory::get();
        $job_types = JobType::get();
        $career_levels = CareerLevel::get();

        return view('front_end.job.index', compact('jobs', 'job_categories', 'job_types', 'career_levels'));
    }

    public function filteredJobs($request)
    {
        $query = Job::query();

        $job_category = $request->job_category;
        $job_type = $request->job_type;
        $career_level = $request->career_level;
        $search = $request->search;
        $location = $request->location;

        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        }

        if ($job_category) {
            $query->where('job_category_id', $job_category);
        }

        if ($job_type) {
            $query->where('job_type_id', $job_type);
        }

        if ($career_level) {
            $query->where('career_level_id', $career_level);
        }

        if ($location) {
            $locations = Location::where('name', 'like', '%' . $location . '%')->get();
            $locations_ids = [];
            foreach ($locations as $loc) {
                if ($loc->type == 'country') {
                    foreach ($loc->cities as $city) {
                        $locations_ids = array_merge($locations_ids, $city->areas->pluck('id')->toArray());
                    }
                } elseif ($loc->type == 'city') {
                    $locations_ids = array_merge($locations_ids, $loc->areas->pluck('id')->toArray());
                } else {
                    $locations_ids[] = $loc->id;
                }
            }
            $query->whereIn('location_id', $locations_ids);
        }
        $jobs = $query->paginate();
        $jobs->load(['location.city.country', 'job_type', 'company']);

        return $jobs;
    }

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

        if (auth()->check() && auth()->user()->IsEmployee()) {
            $applied_before = auth()->user()->employee->jobs->where('id', $job->id)->first() ? true : false;
        }

        return view('front_end.job.show', compact('job', 'applied_before'));
    }

    public function recommendedJobs()
    {
        $jobs = auth()->user()->employee->getJobsWithCommonSkills();
        $jobs->load(['location.city.country', 'job_type', 'company']);
        return view('front_end.job.recommended', compact('jobs'));
    }
}
