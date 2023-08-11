<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Admin\Grade;
use App\Models\Admin\Degree;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Education\UpdateEducationRequest;
use App\Models\Admin\University;

class EmployeeEducationController extends Controller
{
    public function education()
    {
        $degrees = Degree::get();
        $grades = Grade::get();
        $user = auth()->user();
        $education = auth()->user()->employee->education;
        if ($education) {
            $education->load([
                'university'
            ]);
        }
        return view('front_end.profile.education', compact('user', 'education', 'degrees', 'grades'));
    }

    public function educationUpdate(UpdateEducationRequest $request)
    {
        // dd($request->validated());
        $university = University::where('name', $request->university)->first();
        if (!$university) {
            $university = University::create(['name' => $request->university]);
        }

        $validated_data = $request->validated();
        unset($validated_data['university']);
        $validated_data['university_id'] = $university->id;

        $employee = auth()->user()->employee;

        $employee->education()->updateOrCreate(
            ['employee_id' => $employee->id], // Search attributes
            $validated_data // Values to update or create
        );
        toast('Your Profile has been updated successfully', 'success');
        return redirect()->back();
    }
}
