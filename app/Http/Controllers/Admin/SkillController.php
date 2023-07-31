<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Skill;
use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\StoreSkillRequest;
use App\Http\Requests\Skill\UpdateSkillRequest;



class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::paginate();
        return view('dashboard.pages.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('dashboard.pages.skill.create');
    }

    public function store(StoreSkillRequest $request)
    {
        Skill::create($request->validated());
        toast('Skill has been created successfully', 'success');
        return redirect()->back();
    }

    public function edit(Skill $skill)
    {
        return view('dashboard.pages.skill.edit', compact('skill'));
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        toast('Skill has been updated successfully', 'success');
        return redirect()->back();    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        toast('Skill has been deleted successfully', 'success');
        return redirect()->back();
    }
}
