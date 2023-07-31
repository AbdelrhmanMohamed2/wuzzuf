<?php

namespace App\Http\Controllers\Admin;

use App\Traits\ApiTrait;
use App\Models\Admin\Employee;
use App\Models\Admin\Location;
use App\Http\Controllers\Controller;
use App\Http\Requests\Location\StoreAreaRequest;
use App\Http\Requests\Location\StoreCityRequest;
use App\Http\Requests\Location\StoreCountryRequest;
use App\Http\Requests\Location\StoreLocationRequest;
use App\Http\Requests\Location\UpdateLocationRequest;

class LocationController extends Controller
{
    use ApiTrait;

    public function index()
    {
        $locations = Location::where('type', 'country')->paginate();
        return view('dashboard.pages.location.index', compact('locations'));
    }

    public function create()
    {
        return view('dashboard.pages.location.create');
    }


    public function storeCountry(StoreCountryRequest $request)
    {
        Location::create($request->validated());
        toast('Country has been created successfully', 'success');
        return redirect()->back();
    }

    public function storeCity(StoreCityRequest $request)
    {
        Location::create($request->validated());
        toast('City has been created successfully', 'success');
        return redirect()->back();
    }

    public function storeArea(StoreAreaRequest $request)
    {
        Location::create(['parent_id' => $request->city_id] + $request->validated());
        toast('Area has been created successfully', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }


    // public function update(UpdateLocationRequest $request, Location $location)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }

    public function getCities(Location $location)
    {
        return $this->apiResponse(data: $location->cities);
    }

    public function getAreas(Location $location)
    {
        return $this->apiResponse(data: $location->areas);
    }

    public function getCountries()
    {
        $countries = Location::where('type', 'country')->get(['id', 'name']);
        return $this->apiResponse(data: $countries);
    }
}
