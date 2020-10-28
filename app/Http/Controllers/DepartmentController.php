<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DepartmentController extends Controller
{
    public function store()
    {
        $dept = Department::create($this->validateRequest());

        return redirect($dept->path());
    }

    public function update(Department $department)
    {
        $department->update($this->validateRequest());

        return redirect($department->path());
    }

    protected function validateRequest()
    {
        return request()->validate([
            'department' => ['required', 'max:255'],
            'is_active' => ['required', Rule::In([1, 0])],
            'dept_head' => 'nullable|max:128'
        ]);
    }
}
