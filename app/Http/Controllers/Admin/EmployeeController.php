<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Traits\UploadFile;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Admin\Degree;
use App\Models\Admin\Grade;
use App\Models\Admin\Language;

class EmployeeController extends Controller
{
    use UploadFile;

    public function index()
    {
        $employees = Employee::with('user')->paginate();
        $languages = Language::get();
        $degrees = Degree::get();
        $grades = Grade::get();
        return view('dashboard.pages.employee.index', compact('employees', 'degrees','grades', 'languages'));
    }

    public function create()
    {
        return view('dashboard.pages.employee.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $image_name = $this->uploadFile(User::UPLOADED_IMAGE, $request->image);
        $cv_name = $this->uploadFile(Employee::UPLOADED_CV, $request->cv_file);

        User::create([
            'image' => $image_name,
            'role' => 'employee',
        ] + $request->validated())->employee()->create([
            'cv_file' => $cv_name,
        ] + $request->validated());

        toast('Employee has been created successfully', 'success');
        return redirect()->back();
    }

    public function show(Employee $employee)
    {
        $employee->load([
            'user',
            'languages',
            'skills',
            'education.university',
            'education.degree',
            'education.grade',
            'experiences.job_type',
            'experiences.job_category',
        ]);
        return view('dashboard.pages.employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $employee->load('user');
        return view('dashboard.pages.employee.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validated_data = $request->validated();
        if (is_null($validated_data['password'])) {
            unset($validated_data['password']);
        }

        $image_name = $request->has('image') ? $this->uploadFile(User::UPLOADED_IMAGE, $request->image, $employee->user->image) : $employee->user->image;
        $cv_name = $request->has('cv_file') ? $this->uploadFile(Employee::UPLOADED_CV, $request->cv_file, $employee->cv_file) : $employee->cv_file;

        $employee->user->update([
            'image' => $image_name,
        ] + $validated_data);
        $employee->update([
            'cv_file' => $cv_name,
        ] + $validated_data);

        toast('Employee has been updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy(Employee $employee)
    {
        $user = $employee->user;
        $this->removeFile(Employee::UPLOADED_CV, $employee->cv_file);
        $this->removeFile(User::UPLOADED_IMAGE, $user->image);
        $employee->delete();
        $user->delete();
        toast('Employee has been deleted successfully', 'success');
        return redirect()->back();
    }

    public function downloadCv(Employee $employee)
    {
        $file = public_path($employee::UPLOADED_CV . $employee->cv_file);
        return Response::download($file, $employee->cv_file);
    }
}
