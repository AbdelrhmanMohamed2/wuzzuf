<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UpdateAdminProfileRequest;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('dashboard.pages.profile', compact('user'));
    }

    public function update(UpdateAdminProfileRequest $request)
    {
        $validated_data = $request->validated();
        if (is_null($validated_data['password'])) {
            unset($validated_data['password']);
        }
        auth()->user()->update($validated_data);
        toast('Your Profile has been updated successfully', 'success');
        return redirect()->back();
    }

}
