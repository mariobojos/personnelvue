<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function store()
    {
        Employee::create([
            'lastname' => request('lastname'),
            'firstname' => request('firstname'),
            'midname' => request('midname'),
            'dob' => request('dob'),
            'date_hired' => request('date_hired'),
            'is_available' => request('is_available'),
            'emp_status' => request('emp_status'),
            'civil_status' => request('civil_status'),
            'address1' => request('address1'),
            'address2' => request('address2'),
            'email' => request('email'),
            'phone' => request('phone'),
            'sss_num' => request('sss_num'),
            'tin' => request('tin'),
            'pagibig' => request('pagibig'),
        ]);
    }
}
