<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use App\Models\Admin\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\profile\UpdateProfileRequest;

class ProfileController extends Controller
{
    use UploadFile;

    public function index()
    {
        $user = auth()->user();
        return view('front_end.profile.profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('front_end.profile.edit', compact('user'));
    }
}
