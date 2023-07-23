<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin\Job;
use App\Models\Admin\Post;
use App\Models\Admin\Skill;
use Illuminate\Http\Request;
use App\Models\Admin\JobType;
use App\Models\Admin\Language;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::groupBy('role')
            ->select('role', DB::raw('count(*) as count'))
            ->get();

        $employees_count = $users->where('role', 'employee')->first()->count;
        $companies_count = $users->where('role', 'company')->first()->count;

        $types_counts = JobType::withCount('jobs')->get();
        $jobs_count = Job::count();
        $posts_count = Post::count();

        $top5Languages = Language::with('employees', 'jobs')
            ->get()->sortBy(function ($language) {
                return ($language->employees->count() + $language->jobs->count());
            }, descending: true)->take(5)->values();

        $top5skills = Skill::with('employees', 'jobs')
            ->get()->sortBy(function ($skill) {
                return ($skill->employees->count() + $skill->jobs->count());
            }, descending: true)->take(5)->values();
        return view('dashboard.pages.home', compact(
            'types_counts',
            'companies_count',
            'employees_count',
            'jobs_count',
            'posts_count',
            'top5Languages',
            'top5skills',
        ));
    }
}
