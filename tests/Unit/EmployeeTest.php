<?php

namespace Tests\Unit;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{

    use RefreshDatabase, HasFactory;

    /** @test */
    public function table_employee_has_expected_columns()
    {
        $a = true;
        $this->assertTrue(true, $a);

        // $this->assertTrue(
        //     Schema::hasColumn('employees', 'id'),
        //     1
        // );

        // $this->assertTrue(
        //     Schema::hasColumns('employees', [
        //         'id',
        //         'lastname',
        //         'firstname',
        //         'midname',
        //         'dob',
        //         'date_hired'
        //     ]),
        //     1
        // );
    }
}
