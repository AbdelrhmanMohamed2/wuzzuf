<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Traits\UploadFile;

class RegisterEmployeeController extends Controller
{
    use UploadFile;
    public function create()
    {
        return view('front_end.auth.register-employee');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $image_name = $this->uploadFile(User::UPLOADED_IMAGE, $request->image);
        $cv_name = $this->uploadFile(Employee::UPLOADED_CV, $request->cv_file);

        User::create([
            'image' => $image_name,
            'role' => 'employee',
        ] + $request->validated())
            ->employee()->create([
                'cv_file' => $cv_name,
            ] + $request->validated());

        toast('You Have Registered Successfully, You Can Login Now', 'success');
        return redirect()->route('login');
    }
}
