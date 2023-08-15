<?php

namespace App\Http\Controllers\Frontend\Company;

use App\Models\Admin\Job;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class CandidateController extends Controller
{
    public function profile(Job $job, Employee $employee)
    {
        $employee->load(['user']);
        return view('front_end.company.candidates.candidate.profile', compact('employee', 'job'));
    }

    public function downloadCv(Job $job, Employee $employee)
    {
        $file = public_path($employee::UPLOADED_CV . $employee->cv_file);
        try {
            return Response::download($file, $employee->cv_file);
        } catch (\Throwable $th) {
        }
        toast('Unable to download CV file', 'error');
        return redirect()->back();
    }

    public function skills(Job $job, Employee $employee)
    {
        $employee->load(['user', 'skills']);
        return view('front_end.company.candidates.candidate.skills', compact('employee', 'job'));
    }

    public function education(Job $job, Employee $employee)
    {
        $employee->load(['user', 'education.university', 'education.degree', 'education.grade']);
        return view('front_end.company.candidates.candidate.education', compact('employee', 'job'));
    }

    public function experiences(Job $job, Employee $employee)
    {
        $employee->load(['user', 'experiences']);
        return view('front_end.company.candidates.candidate.experiences', compact('employee', 'job'));
    }

    public function languages(Job $job, Employee $employee)
    {
        $employee->load(['user', 'languages']);
        return view('front_end.company.candidates.candidate.languages', compact('employee', 'job'));
    }
}
