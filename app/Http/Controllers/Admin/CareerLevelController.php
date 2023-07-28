<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\CareerLevel;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerLevel\StoreCareerLevelRequest;
use App\Http\Requests\CareerLevel\UpdateCareerLevelRequest;


class CareerLevelController extends Controller
{
    public function index()
    {
        $career_levels = CareerLevel::paginate();
        return view('dashboard.pages.career_level.index', compact('career_levels'));
    }

    public function create()
    {
        return view('dashboard.pages.career_level.create');
    }

    public function store(StoreCareerLevelRequest $request)
    {
        CareerLevel::create($request->validated());
        toast('Career Level has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(CareerLevel $careerLevel)
    {
        return view('dashboard.pages.career_level.edit', compact('careerLevel'));
    }

    public function update(UpdateCareerLevelRequest $request, CareerLevel $careerLevel)
    {
        $careerLevel->update($request->validated());
        toast('Career Level has been updated successfully', 'success');
        return redirect()->back();    }

    public function destroy(CareerLevel $careerLevel)
    {
        try {
            $careerLevel->delete();
            toast('Career Level has been deleted successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast('You cant delete Career Level', 'error');
            return redirect()->back();
        }
    }
}
