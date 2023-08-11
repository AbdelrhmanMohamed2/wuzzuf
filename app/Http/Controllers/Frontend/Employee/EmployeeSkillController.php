<?php

namespace App\Http\Controllers\Frontend\Employee;

use App\Models\Admin\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\profile\AddSkillRequest;

class EmployeeSkillController extends Controller
{

    public function skills()
    {
        $skills = auth()->user()->employee->skills;
        $user = auth()->user();

        return view('front_end.profile.skills', compact('skills', 'user'));
    }

    public function storeSkill(AddSkillRequest $request)
    {
        $skill = Skill::where('name', $request->name)->first();

        if (!$skill) {
            $skill = Skill::create(['name' => $request->name]);
        }

        $employee_skills = auth()->user()->employee->skills;

        if (!$employee_skills->where('name', '=', $skill->name)->first()) {
            auth()->user()->employee->skills()->attach($skill);
            toast('You Added a new Skill successfully', 'success');
        } else {
            toast('You Already has this skill before', 'error');
        }

        return redirect()->back();
    }

    public function detachSkill(Skill $skill)
    {
        $employee_skills = auth()->user()->employee->skills;

        if (!$employee_skills->where('name', '=', $skill->name)->first()) {
            toast('You do not have this skill before', 'error');
        } else {
            auth()->user()->employee->skills()->detach($skill);
            toast('You have removed this Skill successfully', 'success');
        }

        return redirect()->back();
    }
}
