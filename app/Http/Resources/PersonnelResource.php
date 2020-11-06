<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonnelResource extends JsonResource
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
//            'lastname' => $this->lastname,
//            'firstname' => $this->firstname,
//            'midname' => $this->midname,
            'id' => $this->id,
            'fullName' => $this->lastname . ', ' . $this->firstname . ' ' . $this->midname,
            'dateHired' => $this->date_hired->toFormattedDateString(),
            'department' => $this->toDepartmentName($this->department),
            'position' => $this->position,
            'empStatus' => $this->emp_status == 'REG' ? 'Regular' : 'Probationary',
        ];
    }

    private function toDepartmentName(string $dept) : string
    {
        switch ($dept) {
            case 'MKT' : $department = 'Marketing'; break;
            case 'HR' : $department = 'Human Resource'; break;
            case 'SVC' : $department = 'Services'; break;
            default:
                $department = 'Information Technology';
        }
        return $department;
    }
}
