<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use App\Models\Admin\Industry;
use App\Models\Admin\Location;
use App\Models\Admin\CompanySize;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreCompanyRequest;

class RegisterCompanyController extends Controller
{
    use UploadFile;

    public function create()
    {
        $company_sizes = CompanySize::get(['id', 'name']);
        $industries = Industry::get(['id', 'name']);
        $countries = Location::where('type', 'country')->get(['id', 'name']);
        return view('front_end.auth.register-company',compact('company_sizes', 'industries', 'countries'));
    }

    public function store(StoreCompanyRequest $request)
    {
        $image_name = $this->uploadFile(User::UPLOADED_IMAGE, $request->image);
        User::create(['image' => $image_name, 'role' => 'company'] + $request->validated())->company()->create($request->validated());
        toast('You Have Registered Successfully, You Can Login Now', 'success');
        return redirect()->route('login');
    }
}
