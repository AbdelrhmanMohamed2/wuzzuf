<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\University;
use App\Http\Controllers\Controller;
use App\Http\Requests\University\StoreUniversityRequest;
use App\Http\Requests\University\UpdateUniversityRequest;



class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::paginate();
        return view('dashboard.pages.university.index', compact('universities'));
    }

    public function create()
    {
        return view('dashboard.pages.university.create');
    }

    public function store(StoreUniversityRequest $request)
    {
        University::create($request->validated());
        toast('University has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(University $university)
    {
        return view('dashboard.pages.university.edit', compact('university'));
    }

    public function update(UpdateUniversityRequest $request, University $university)
    {
        $university->update($request->validated());
        toast('University has been updated successfully', 'success');
        return redirect()->back();    }

    public function destroy(University $university)
    {
        try {
            $university->delete();
            toast('University has been deleted successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast('You cant delete University', 'error');
            return redirect()->back();
        }
    }
}
