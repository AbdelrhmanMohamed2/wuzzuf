<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin\Job;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Models\Admin\Company;
use App\Models\Admin\JobCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $job_categories =JobCategory::select('id', 'name')->withCount('jobs')->orderBy('jobs_count', 'desc')->take(10)->get();
        $jobs = Job::with(['location.city.country', 'job_type', 'company'])->orderBy('created_at', 'desc')->take(20)->get();
        $companies = Company::select('id', 'name', 'user_id')->with(['user' => function($q) {return $q->select(['id', 'image']);}])->withCount('jobs')->orderBy('jobs_count', 'desc')->take(10)->get();
        $posts = Post::orderBy('created_at', 'desc')->withCount('comments')->take(4)->get();
        return view('front_end.index', compact('job_categories', 'jobs', 'companies', 'posts'));
    }
}
