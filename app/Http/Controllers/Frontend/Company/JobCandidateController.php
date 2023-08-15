<?php

namespace App\Http\Controllers\Frontend\Company;

use App\Models\Admin\Job;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;

class JobCandidateController extends Controller
{
    public function index(Job $job)
    {
        $employees = $job->employees;
        $employees->load(['user']);
        return view('front_end.company.candidates.index', compact('job', 'employees'));
    }

    public function accept(Job $job, Employee $employee)
    {
        if ($job->employees()->where('employee_id', $employee->id)->first()->pivot->status == 'pending') {
            $job->employees()->updateExistingPivot($employee->id, ['status' => 'accepted']);
            toast('employee accepted', 'success');
        } else {
            toast('can not change status of employee', 'error');
        }
        return redirect()->back();
    }

    public function reject(Job $job, Employee $employee)
    {
        if ($job->employees()->where('employee_id', $employee->id)->first()->pivot->status == 'pending') {
            $job->employees()->updateExistingPivot($employee->id, ['status' => 'rejected']);
            toast('employee rejected', 'success');
        } else {
            toast('can not change status of employee', 'error');
        }
        return redirect()->back();
    }
}
