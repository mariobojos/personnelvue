<?php

namespace Database\Factories;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'lastname' => $this->faker->lastname,
            'firstname' => $this->faker->firstname,
            'midname' => $this->faker->lastname,
            'dob' => Carbon::now()->subYear(random_int(18, 60)),
            'date_hired' => now()->subYear(random_int(1, 9)),
            'is_available' => random_int(0, 1),
            'emp_status' => 'REG',
            'civil_status' => 'SINGLE',
            'address1' => $this->faker->address,
            'address2' => $this->faker->country,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'sss_num' => random_int(111111111111111, 999999999999999),
            'tin' => random_int(111111111111111, 999999999999999),
            'pagibig' => random_int(111111111111111, 999999999999999),
        ];
    }
}
