<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\User;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::with('user')->paginate();
        return view('dashboard.pages.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('dashboard.pages.admin.create');
    }

    public function store(StoreAdminRequest $request)
    {
        Admin::create(['user_id' => User::create(['role' => 'admin'] + $request->validated())->id]);
        toast('Admin has been added successfully', 'success');
        return redirect()->back();
    }

    public function edit(Admin $admin)
    {
        return view('dashboard.pages.admin.edit', compact('admin'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $validated_data = $request->validated();
        if (is_null($validated_data['password'])) {
            unset($validated_data['password']);
        }
        $admin->user->update($validated_data);
        toast('Admin has been updated successfully', 'success');
        return redirect()->back();
    }

    public function destroy(Admin $admin)
    {
        $user = $admin->user;
        $admin->delete();
        $user->delete();
        toast('Admin has been deleted successfully', 'success');
        return redirect()->back();
    }
}
