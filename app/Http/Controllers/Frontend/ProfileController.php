<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\profile\UpdateProfileRequest;
use App\Models\Admin\CompanySize;
use App\Models\Admin\Location;

class ProfileController extends Controller
{
    use UploadFile;

    public function index()
    {
        $user = auth()->user();
        // dd($company_sizes, $countries);
        return view('front_end.profile.profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();

        $company_sizes = CompanySize::get();
        if(auth()->user()->IsCompany())
        {
            $countries = Location::where('type', 'country')->get();
            $cities =  Location::where('id', $user->company->area_id)->first()->city->country->cities;
            $areas =  Location::where('id', $user->company->area_id)->first()->city->areas;
        }

        $data = compact('user') + (auth()->user()->IsCompany() ? [
            'company_sizes' => $company_sizes,
            'countries' => $countries,
            'cities' => $cities,
            'areas' => $areas,
        ] : []);

        return view('front_end.profile.edit', $data);
    }
}
