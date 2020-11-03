<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['dob', 'date_hired'];

    /**
     * This function make the Model possess a feature that it can return the path for this record.
     * @version 2020-10-29 0936H
     */
    public function path()
    {
        return '/personnels/' . $this->id;
    }
}
