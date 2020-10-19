<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * This function make the Model possess a feature that it can return the path for this record.
     * @version 2020-10-19 1042H
     */
    public function path()
    {
        return '/departments/' . $this->id;
    }
}
