<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\profile\AddSkillRequest;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\profile\UpdateProfileRequest;
use App\Models\Admin\Degree;
use App\Models\Admin\Grade;
use App\Models\Admin\Skill;

class EmployeeProfileController extends Controller
{
    public function update(UpdateProfileRequest $request)
    {
        $validated_data = $request->validated();
        if (is_null($validated_data['password'])) {
            unset($validated_data['password']);
        }

        // dd($validated_data);

        $image_name = $request->has('image') ? $this->uploadFile(User::UPLOADED_IMAGE, $request->image, auth()->user()->image) : auth()->user()->image;
        $cv_name = $request->has('cv_file') ? $this->uploadFile(Employee::UPLOADED_CV, $request->cv_file, auth()->user()->employee->cv_file) : auth()->user()->employee->cv_file;

        auth()->user()->update([
            'image' => $image_name,
        ] + $validated_data);
        auth()->user()->employee()->update([
            'cv_file' => $cv_name,
            'title' => $validated_data['title'],
        ]);

        toast('Your Profile has been updated successfully', 'success');
        return redirect()->back();
    }

    public function downloadCv()
    {
        $employee = auth()->user()->employee;
        $file = public_path($employee::UPLOADED_CV . $employee->cv_file);
        return Response::download($file, $employee->cv_file);
    }
}
