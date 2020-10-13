<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function store()
    {
        Employee::create($this->validateRequest());
    }

    public function update(Employee $employee)
    {
        $employee->update($this->validateRequest());
    }

    protected function validateRequest()
    {
        return request()->validate([
            'lastname' => 'required|max:40',
            'firstname' => 'required|max:50',
            'midname' => 'string|min:0|max:40',
            'dob' => 'required',
            'date_hired' => 'nullable|date',
            'is_available' => 'required',
            'emp_status' => ['required', Rule::In(['PROBY', 'REG'])],
            'civil_status' => [
                'required',
                Rule::In(['SINGLE', 'MARRIED', 'LEGALLY SEPARATED', 'DIVORCED', 'WIDOW/ER'])
            ],
            'email' => 'required|email|max:255',
            'phone' => ['required', 'numeric'],
            'address1' => 'required|max:255',
            'address2' => 'max:255',
            'sss_num' => 'nullable|max:15',
            'tin' => 'nullable|string|max:15',
            'pagibig' => 'nullable|string|max:15',
        ]);
    }
}
