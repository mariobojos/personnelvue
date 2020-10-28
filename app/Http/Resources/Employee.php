<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'midname' => $this->midname,
            'dob' => $this->dob,
            'date_hired' => $this->date_hired,
        ];
    }
}
