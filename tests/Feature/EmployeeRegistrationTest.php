<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Employee;

class EmployeeRegistrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_employee_can_be_registered()
    {
        // Remove Laravel exception handling
        $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertOk();

        $this->assertCount(1, Employee::all());
    }

    /** @test */
    public function an_employee_can_be_updated()
    {
        $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $employee = Employee::first();

        $response = $this->patch('/employees/' . $employee->id, [
            'lastname' => 'Yobomo1',
            'firstname' => 'Hortag1',
            'midname' => 'Ozmo1',
            'dob' => '1983-10-14',
            'date_hired' => '2018-11-24',
            'is_available' => 0,
            'emp_status' => 'PROBY',
            'civil_status' => 'SINGLE',
            'address1' => 'Brgy Ginebra',
            'address2' => 'Cebu City',
            'email' => 'Hortag1b@codev.com',
            'phone' => '09871234562',
            'sss_num' => '61450123',
            'tin' => '895632542',
            'pagibig' => '1000325653',
        ]);

        $employee = Employee::first();

        $this->assertEquals('Yobomo1', $employee->lastname);
        $this->assertEquals('Hortag1', $employee->firstname);
        $this->assertEquals('Ozmo1', $employee->midname);
        $this->assertEquals('1983-10-14', $employee->dob);
        $this->assertEquals('2018-11-24', $employee->date_hired);
        $this->assertEquals(0, $employee->is_available);
        $this->assertEquals('PROBY', $employee->emp_status);
        $this->assertEquals('SINGLE', $employee->civil_status);
        $this->assertEquals('Brgy Ginebra', $employee->address1);
        $this->assertEquals('Cebu City', $employee->address2);
    }

    /** @test */
    public function an_employee_can_be_deleted()
    {
        // Insert a record
        $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        // Get the inserted record
        $employee = Employee::first();

        // This statement is optional, but since the Victor the YouTuber is doing it
        $this->assertCount(1, Employee::all());

        // Delete the record
        $response = $this->delete('/employees/' . $employee->id);

        $this->assertCount(0, Employee::all());
    }

    /** @test */
    public function a_lastname_is_required()
    {
        $response = $this->post('/employees', [
            'lastname' => '',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('lastname');
    }

    /** @test */
    public function a_lastname_is_40_char_max()
    {
        $response = $this->post('/employees', [
            'lastname' => '12345678901234567890123456789012345678901',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('lastname');
    }

    /** @test */
    public function a_firstname_is_required()
    {
        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => '',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('firstname');
    }

    /** @test */
    public function a_firstname_is_40_chars_max()
    {
        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => '123456789012345678901234567890123456789012345678901',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('firstname');
    }

    /** @test */
    public function a_midname_is_nullable()
    {
        // $this->withoutExceptionHandling();
        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => null,
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('midname');
    }

    /** @test */
    public function a_midname_is_40_chars_max()
    {
        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => '12345678901234567890123456789012345678901',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('midname');
    }

    /** @test */
    public function a_dob_is_nullable()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => null,
            'date_hired' => '2018-11-23',
            'is_available' => true,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('dob');
    }

    /** @test */
    public function an_is_available_is_required()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => null,
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('is_available');
    }

    public function testAnEmpStatusIsRequired()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => '',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('emp_status');
    }

    public function testAnEmpStatusIsNotInRange()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'AnyValue',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('emp_status');
    }

    /** @test */
    public function a_civil_status_is_required()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'AnyValue',
            'civil_status' => '',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('civil_status');
    }

    /** @test */
    public function a_civil_status_is_not_in_range()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'AnyValueHere',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('civil_status');
    }

    /** @test */
    public function an_address1_is_required()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => '',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('address1');
    }

    /** @test */
    public function an_address1_is_maxed_255()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lasstname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => '1234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('address1');
    }

    /** @test */
    public function an_address2_is_not_required()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => null,
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertOk();
    }

    /** @test */
    public function a_date_hired_is_nullable()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => null,
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => null,
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        // $response->assertSessionHasErrors('date_hired');
        $response->assertOk();
    }

    /** @test */
    public function an_email_is_valid()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb.com',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function a_phone_is_valid()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561a',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('phone');
    }

    /** @test */
    public function a_phone_is_required()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('phone');
    }

    /** @test */
    public function an_email_is_required()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => '',
            'phone' => '09871234561',
            'sss_num' => '61450122',
            'tin' => '895632541',
            'pagibig' => '1000325652',
        ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function an_sss_num_tin_pagibig_is_not_required()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => 'Hortagb@codev.com',
            'phone' => '09871234561',
            'sss_num' => '',
            'tin' => '',
            'pagibig' => '',
        ]);

        $response->assertSessionHasNoErrors(); //['sss_num', 'tin', 'pagibig']);
    }

    /** @test */
    public function an_sss_num_tin_pagibig_is_15_char_maxed()
    {
        // $this->withoutExceptionHandling();

        $response = $this->post('/employees', [
            'lastname' => 'Yobomo',
            'firstname' => 'Hortag',
            'midname' => 'Ozmo',
            'dob' => '1983-10-13',
            'date_hired' => '2018-11-23',
            'is_available' => 'true',
            'emp_status' => 'REG',
            'civil_status' => 'MARRIED',
            'address1' => 'Brgy Mabolo',
            'address2' => 'Cebu City',
            'email' => '',
            'phone' => '09185360143',
            'sss_num' => '1234567890123456',
            'tin' => '1234567890123456',
            'pagibig' => '1234567890123456',
        ]);

        $response->assertSessionHasErrors(['sss_num', 'tin', 'pagibig']);
    }
}
