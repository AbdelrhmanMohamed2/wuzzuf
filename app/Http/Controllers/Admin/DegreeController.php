<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Degree;
use App\Http\Controllers\Controller;
use App\Http\Requests\Degree\StoreDegreeRequest;
use App\Http\Requests\Degree\UpdateDegreeRequest;

class DegreeController extends Controller
{
    public function index()
    {
        $degrees = Degree::paginate();
        return view('dashboard.pages.degree.index', compact('degrees'));
    }

    public function create()
    {
        return view('dashboard.pages.degree.create');
    }

    public function store(StoreDegreeRequest $request)
    {
        Degree::create($request->validated());
        toast('Degree has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(Degree $degree)
    {
        return view('dashboard.pages.degree.edit', compact('degree'));
    }

    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        $degree->update($request->validated());
        toast('Degree has been updated successfully', 'success');
        return redirect()->back();    }

    public function destroy(Degree $degree)
    {
        try {
            $degree->delete();
            toast('Degree has been deleted successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast('You cant delete Degree', 'error');
            return redirect()->back();
        }
    }
}
