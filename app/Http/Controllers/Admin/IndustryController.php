<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Industry;
use App\Http\Controllers\Controller;
use App\Http\Requests\Industry\StoreIndustryRequest;
use App\Http\Requests\Industry\UpdateIndustryRequest;



class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::paginate();
        return view('dashboard.pages.industry.index', compact('industries'));
    }

    public function create()
    {
        return view('dashboard.pages.industry.create');
    }

    public function store(StoreIndustryRequest $request)
    {
        Industry::create($request->validated());
        toast('Industry has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(Industry $industry)
    {
        return view('dashboard.pages.industry.edit', compact('industry'));
    }

    public function update(UpdateIndustryRequest $request, Industry $industry)
    {
        $industry->update($request->validated());
        toast('Industry has been updated successfully', 'success');
        return redirect()->back();    }

    public function destroy(Industry $industry)
    {
        try {
            $industry->delete();
            toast('Industry has been deleted successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast('You cant delete Industry', 'error');
            return redirect()->back();
        }
    }
}
