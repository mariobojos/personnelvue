<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    // $dates is a built-in Laravel array with member rows automatically converted to Carbon\Carbon object
    protected $dates = ['dob', 'date_hired'];

    /**
     * This function make the Model possess a feature that it can return the path for this record.
     * @version 2020-10-15 1244H
     */
    public function path()
    {
        return '/employees/' . $this->id;
    }

    /**
     * Standard setter function of Laravel with the format of setFieldNameAttribute
     * @version 2020-10-16 1224H
     */
    // public function setDobAttribute($dob)
    // {
    //     $this->attributes['dob'] = Carbon::parse($dob);
    // }
}
