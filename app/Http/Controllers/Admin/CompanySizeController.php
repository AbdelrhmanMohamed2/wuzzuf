<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\CompanySize;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanySize\StoreCompanySizeRequest;
use App\Http\Requests\CompanySize\UpdateCompanySizeRequest;


class CompanySizeController extends Controller
{
    public function index()
    {
        $company_sizes = CompanySize::paginate();
        return view('dashboard.pages.company_size.index', compact('company_sizes'));
    }

    public function create()
    {
        return view('dashboard.pages.company_size.create');
    }

    public function store(StoreCompanySizeRequest $request)
    {
        CompanySize::create($request->validated());
        toast('Company Size has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(CompanySize $companySize)
    {
        return view('dashboard.pages.company_size.edit', compact('companySize'));
    }

    public function update(UpdateCompanySizeRequest $request, CompanySize $companySize)
    {
        $companySize->update($request->validated());
        toast('Company Size has been updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy(CompanySize $companySize)
    {
        try {
            $companySize->delete();
            toast('Company Size has been deleted successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast('You cant delete Company Size', 'error');
            return redirect()->back();
        }
    }
}
