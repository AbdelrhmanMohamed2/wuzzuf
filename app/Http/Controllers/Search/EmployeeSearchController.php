<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use App\Models\Admin\Education;
use App\Models\Admin\Employee;
use App\Models\Admin\University;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class EmployeeSearchController extends Controller
{
    use ApiTrait;
    public function filterEmployees(Request $request)
    {
        $query = Employee::query();

        $degree = $request->input('degree_id');
        $grade = $request->input('grade_id');
        $language = $request->input('language_id');
        $skill = $request->input('skill');
        $university = $request->input('university');

        if ($degree) {
            $query->whereHas('education', function ($q) use ($degree) {
                $q->where('degree_id', $degree);
            });
        }

        if ($grade) {
            $query->whereHas('education', function ($q) use ($grade) {
                $q->where('grade_id', $grade);
            });
        }

        if ($university) {
            $universities = University::where('name', 'like', '%' . $university . '%')->pluck('id');
            $query->whereHas('education', function ($q) use ($universities) {
                $q->whereIn('university_id', $universities);
            });
        }

        if ($language) {
            $query->whereHas('languages', function ($q) use ($language) {
                $q->where('language_id', $language);
            });
        }

        if ($skill) {
            $query->whereHas('skills', function ($q) use ($skill) {
                $q->where('name', 'like', '%' . $skill . '%');
            });
        }

        $employees = $query->with('user')->get();


        return $this->apiResponse(data: $employees, message:csrf_token());
    }
}
