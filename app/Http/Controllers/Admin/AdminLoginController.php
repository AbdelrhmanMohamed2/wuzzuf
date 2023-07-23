<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\AdminLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Auth\Access\AuthorizationException;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.login');
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if (!auth()->user()->admin) {
            throw new AuthorizationException();
        }

        toast('Welcome ' . auth()->user()->full_name ,'success');
        return redirect()->route('dashboard.index');
    }
}
