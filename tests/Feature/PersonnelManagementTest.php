<?php

namespace Tests\Feature;

use App\Http\Resources\PersonnelResource;
use Tests\TestCase;
use App\Models\Personnel;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonnelManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_personnel_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('api/personnels', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'emp_status' => 'REG',
            'gender' => 'F',
            'civil_status' => 'MAR',
            'position' => 'Developer',
            'department' => 'IT',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
        ]);

        $person = Personnel::latest();

        $this->assertCount(1, Personnel::all());
        $this->assertInstanceof(Carbon::class, $person->first()->date_hired);
    }

    /** @test */
    public function a_personnel_list_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        Personnel::factory(5)->create();
        $people = Personnel::all();
        $this->assertCount(5, $people);
        $this->assertCount(5, PersonnelResource::collection($people));
    }
}
