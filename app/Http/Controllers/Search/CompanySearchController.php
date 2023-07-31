<?php

namespace App\Http\Controllers\Search;

use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Company;
use App\Models\Admin\Location;

class CompanySearchController extends Controller
{
    use ApiTrait;
    public function search(Request $request)
    {
        $searchTerm = $request->input('q');

        $jobs = Company::where('name', 'like', '%' . $searchTerm . '%')->get(['id', 'name']);

        return $this->apiResponse(data: $jobs);
    }

    public function filter(Request $request)
    {
        $query = Company::query();

        $industry = $request->input('industry');
        $company_size = $request->input('company_size');
        $location = $request->input('location');

        if ($industry) {
            $query->where('industry_id', $industry);
        }

        if ($company_size) {
            $query->where('company_size_id', $company_size);
        }


        if ($location) {
            $locations = Location::where('name', 'like', '%' . $location . '%')->get();
            $locations_ids = [];
            foreach ($locations as $loc) {
                if ($loc->type == 'country') {
                    foreach ($loc->cities as $city) {
                        $locations_ids = array_merge($locations_ids, $city->areas->pluck('id')->toArray());
                    }
                } elseif ($loc->type == 'city') {
                    $locations_ids = array_merge($locations_ids, $loc->areas->pluck('id')->toArray());
                } else {
                    $locations_ids[] = $loc->id;
                }
            }
            $query->whereIn('area_id', $locations_ids);

        }

        $companies = $query->get();


        return $this->apiResponse(data: $companies, message: csrf_token());
    }
}
