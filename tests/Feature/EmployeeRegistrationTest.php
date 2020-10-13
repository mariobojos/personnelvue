<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;

class EmployeeRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAnEmployeeCanBeRegistered()
    {
        // Remove Laravel exception handling
        $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Bojos',
            'firstname' => 'Mario',
            'midname' => 'Ronel',
            'dob' => '1973-07-14',
            'date_hired' => '2019-05-28',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Sitio Culo, Nivel Hills, Lahug',
            'address2' => 'Cebu City',
            'email' => 'mariob@codev.com',
            'phone' => '09185360134',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertOk();

        $this->assertCount(1, Employee::all());
    }
}
