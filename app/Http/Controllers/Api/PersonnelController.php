<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PersonnelResource;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PersonnelResource::collection(Personnel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person = Personnel::create($this->validateRequest());
         return (['message' => 'Record with id ' . $person->id . ' is saved.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validateRequest()
    {
        return request()->validate([
            'lastname' => 'required|max:50',
            'firstname' => 'required|max:50',
            'midname' => 'string|min:0|max:50',
            'dob' => 'required',
            'date_hired' => 'nullable|date',
            'gender' => ['required', Rule::In(['M', 'F', 'O'])],
            'emp_status' => ['required', Rule::In(['PRB', 'REG'])],
            'civil_status' => [
                'required',
                Rule::In(['SIN', 'MAR', 'SEP', 'DIV', 'WID'])
            ],
            'position' => 'required|min:3|max:50',
            'department' => [
                'required',
                Rule::In(['IT', 'MKT', 'HR', 'SVC'])
            ],
            'email' => 'required|email|max:255',
            'address1' => 'required|max:255',
            'address2' => 'max:255',
        ]);
    }
}
