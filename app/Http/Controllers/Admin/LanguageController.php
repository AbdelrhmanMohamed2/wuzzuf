<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\Language\StoreLanguageRequest;
use App\Http\Requests\Language\UpdateLanguageRequest;



class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::paginate();
        return view('dashboard.pages.language.index', compact('languages'));
    }

    public function create()
    {
        return view('dashboard.pages.language.create');
    }

    public function store(StoreLanguageRequest $request)
    {
        Language::create($request->validated());
        toast('Language has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(Language $language)
    {
        return view('dashboard.pages.language.edit', compact('language'));
    }

    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $language->update($request->validated());
        toast('Language has been updated successfully', 'success');
        return redirect()->back();    }

    public function destroy(Language $language)
    {
        $language->delete();
        toast('Language has been deleted successfully', 'success');
        return redirect()->back();
    }
}
