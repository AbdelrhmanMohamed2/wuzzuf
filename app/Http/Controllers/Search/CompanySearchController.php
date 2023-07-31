<?php

namespace App\Http\Controllers\Search;

use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Company;

class CompanySearchController extends Controller
{
    use ApiTrait;
    public function search(Request $request)
    {
        $searchTerm = $request->input('q');

        $jobs = Company::where('name', 'like', '%' . $searchTerm . '%')->get(['id', 'name']);

        return $this->apiResponse(data: $jobs);
    }
}
