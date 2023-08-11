<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\profile\AddLanguageRequest;
use App\Models\Admin\Language;
use Illuminate\Http\Request;

class EmployeeLanguageController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $languages = $user->employee->languages;
        return view('front_end.profile.language', compact('user', 'languages'));
    }

    public function store(AddLanguageRequest $request)
    {
        $language = Language::where('name', $request->name)->first();
        if (!$language) {
            $language = Language::create(['name' => $request->name]);
        }
        $languages = auth()->user()->employee->languages;
        if (!$languages->where('name', $language->name)->first()) {
            auth()->user()->employee->languages()->attach($language);
            toast('You Added a new language successfully', 'success');
        } else {
            toast('You Already has this language before', 'error');
        }

        return redirect()->back();
    }

    public function destroy(Language $language)
    {
        $employee_languages = auth()->user()->employee->languages;

        if (!$employee_languages->where('name', '=', $language->name)->first()) {
            toast('You do not have this language before', 'error');
        } else {
            auth()->user()->employee->languages()->detach($language);
            toast('You have removed this language successfully', 'success');
        }

        return redirect()->back();
    }
}
