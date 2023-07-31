<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Grade;
use App\Http\Controllers\Controller;
use App\Http\Requests\Grade\StoreGradeRequest;
use App\Http\Requests\Grade\UpdateGradeRequest;



class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::paginate();
        return view('dashboard.pages.grade.index', compact('grades'));
    }

    public function create()
    {
        return view('dashboard.pages.grade.create');
    }

    public function store(StoreGradeRequest $request)
    {
        Grade::create($request->validated());
        toast('Grade has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(Grade $grade)
    {
        return view('dashboard.pages.grade.edit', compact('grade'));
    }

    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        $grade->update($request->validated());
        toast('Grade has been updated successfully', 'success');
        return redirect()->back();    }

    public function destroy(Grade $grade)
    {
        try {
            $grade->delete();
            toast('Grade has been deleted successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast('You cant delete Grade', 'error');
            return redirect()->back();
        }
    }
}
