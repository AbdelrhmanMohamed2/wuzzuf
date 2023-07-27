<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Admin\CompanySize;
use App\Models\Admin\Industry;
use App\Models\Admin\Location;
use App\Models\User;
use App\Traits\UploadFile;

class CompanyController extends Controller
{
    use UploadFile;

    public function index()
    {
        $companies = Company::with(['user', 'company_size', 'industry'])->paginate();
        return view('dashboard.pages.company.index', compact('companies'));
    }

    public function create()
    {
        $company_sizes = CompanySize::select('id as value', 'name as label')->get();
        $industries = Industry::select('id as value', 'name as label')->get();
        $countries = Location::select('id as value', 'name as label')->where('type', 'country')->get();
        return view('dashboard.pages.company.create', compact('company_sizes', 'industries', 'countries'));
    }

    public function store(StoreCompanyRequest $request)
    {
        $image_name = $this->uploadFile(User::UPLOADED_IMAGE, $request->image);
        User::create(['image' => $image_name, 'role' => 'company'] + $request->validated())->company()->create($request->validated());
        toast('Company has been created successfully', 'success');
        return redirect()->back();
    }

    public function show(Company $company)
    {
        $company->load(['user', 'company_size', 'industry', 'location.city.country', 'company_roles']);
        return view('dashboard.pages.company.show', compact('company'));
    }

    public function edit(Company $company)
    {
        $company_sizes = CompanySize::select('id as value', 'name as label')->get();
        $industries = Industry::select('id as value', 'name as label')->get();
        $countries = Location::select('id as value', 'name as label')->where('type', 'country')->get();
        $company->load(['location.city.country.cities', 'location.city.areas']);
        return view('dashboard.pages.company.edit', compact('company', 'company_sizes', 'industries', 'countries'));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $validated_data = $request->validated();
        if (is_null($validated_data['password'])) {
            unset($validated_data['password']);
        }

        $image_name = $request->has('image') ? $this->uploadFile(User::UPLOADED_IMAGE, $request->image, $company->user->image) : $company->user->image;

        $company->user->update(['image' => $image_name] + $validated_data);
        $company->update($validated_data);

        toast('Company has been updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy(Company $company)
    {
        $user = $company->user;
        $company->delete();
        $this->removeFile($user::UPLOADED_IMAGE, $user->image);
        $user->delete();
        toast('Company has been deleted successfully', 'success');
        return redirect()->back();
    }
}
