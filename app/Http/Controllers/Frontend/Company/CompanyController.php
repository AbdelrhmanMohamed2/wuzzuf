<?php

namespace App\Http\Controllers\Frontend\Company;

use Illuminate\Http\Request;
use App\Models\Admin\Company;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function show(Company $company)
    {
        $company->load(['user', 'company_size', 'industry', 'location.city.country']);
        return view('front_end.company.show', compact('company'));
    }

    public function jobs(Company $company)
    {
        $company->load(['jobs.job_type', 'jobs.location.city.country', 'user']);
        return view('front_end.company.jobs', compact('company'));
    }
}
