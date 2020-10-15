<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SkillController extends Controller
{
    public function store()
    {
        $skill = Skill::create($this->validateRequest());
        return redirect($skill->path());
    }

    protected function validateRequest()
    {
        return request()->validate([
            'skill' => ['required', 'max:255'],
            'category' => ['required', Rule::In('TECHNICAL', 'ATTITUDE', 'FUNCTIONAL')],
        ]);
    }
}
