<?php

namespace App\Http\Controllers\Search;

use App\Traits\ApiTrait;
use App\Models\Admin\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobSearchController extends Controller
{
    use ApiTrait;
    public function search(Request $request)
    {
        $searchTerm = $request->input('q');

        $jobs = Job::where('title', 'like', '%' . $searchTerm . '%')->get(['id', 'title', 'company_id']);

        return $this->apiResponse(data: $jobs);
    }

    public function filterJobs(Request $request)
    {
        $query = Job::query();

        $location = $request->input('location_id');
        $jobType = $request->input('job_type_id');
        $careerLevel = $request->input('career_level_id');
        $jobCategory = $request->input('job_category_id');


        if ($location) {
            $query->where('location_id', $location);
        }

        if ($jobType) {
            $query->where('job_type_id', $jobType);
        }

        if ($careerLevel) {
            $query->where('career_level_id', $careerLevel);
        }

        if ($jobCategory) {
            $query->where('job_category_id', $jobCategory);
        }

        $filteredJobs = $query->with(['company' => function ($q) {
            return $q->select('name', 'id');
        }])->get(['title', 'id', 'company_id']);

        return $this->apiResponse(data: $filteredJobs, message:$location);
    }
}
