<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * This function make the Model possess a feature that it can return the path for this record.
     * @version 2020-10-15 1244H
     */
    public function path()
    {
        return '/employees/' . $this->id;
    }
}
