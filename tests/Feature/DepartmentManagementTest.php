<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Department;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartmentManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_department_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/departments', [
            'department' => 'IT',
            'is_active' => 1,
            'dept_head' => 'Mr Boss'
        ]);


        $dept = Department::first();

        $response->assertRedirect('/departments/' . $dept->id);

        $this->assertCount(1, $dept::all());
    }

    /** @test */
    public function a_department_can_be_updated()
    {
        $this->post('/departments', [
            'department' => 'IT',
            'is_active' => 1,
            'dept_head' => 'Mr Boss'
        ]);

        $dept = Department::first();

        $response = $this->patch('/departments/' . $dept->id, [
            'department' => 'Soft Dev',
            'is_active' => 0,
            'dept_head' => ''
        ]);

        $dept = Department::first();

        $this->assertEquals('Soft Dev', $dept->department);
        $this->assertEquals(0, $dept->is_active);
        $this->assertEquals('', $dept->dept_head);
        $response->assertRedirect('/departments/' . $dept->id);
    }
}
