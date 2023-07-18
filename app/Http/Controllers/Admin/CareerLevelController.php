<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\CareerLevel;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerLevel\StoreCareerLevelRequest;
use App\Http\Requests\CareerLevel\UpdateCareerLevelRequest;


class CareerLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerLevelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CareerLevel $careerLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareerLevel $careerLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerLevelRequest $request, CareerLevel $careerLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerLevel $careerLevel)
    {
        //
    }
}
