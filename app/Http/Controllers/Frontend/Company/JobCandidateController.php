<?php

namespace App\Http\Controllers\Frontend\Company;

use App\Events\EmployeeRejected;
use App\Events\EmployeeAccepted;
use App\Models\Admin\Job;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Job\AcceptJobRequest;

class JobCandidateController extends Controller
{
    public function index(Job $job)
    {
        $employees = $job->employees;
        $employees->load(['user']);
        return view('front_end.company.candidates.index', compact('job', 'employees'));
    }

    public function acceptPage (Job $job, Employee $employee)
    {
        return view('front_end.company.candidates.candidate.accept-email', compact('employee', 'job'));
    }

    public function accept(Job $job, Employee $employee, AcceptJobRequest $request)
    {
        if ($job->employees()->where('employee_id', $employee->id)->first()->pivot->status == 'pending') {
            $job->employees()->updateExistingPivot($employee->id, ['status' => 'accepted']);
            toast('employee accepted', 'success');
            event(new EmployeeAccepted($job, $employee, $request->email));
        } else {
            toast('can not change status of employee or send another email.', 'error');
        }
        return redirect()->route('profile.jobs.candidates.index', $job);
    }

    public function reject(Job $job, Employee $employee)
    {
        if ($job->employees()->where('employee_id', $employee->id)->first()->pivot->status == 'pending') {
            $job->employees()->updateExistingPivot($employee->id, ['status' => 'rejected']);
            toast('employee rejected', 'success');
            event(new EmployeeRejected($job, $employee));
        } else {
            toast('can not change status of employee', 'error');
        }
        return redirect()->back();
    }
}
