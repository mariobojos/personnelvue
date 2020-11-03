<?php

namespace Database\Factories;

use App\Models\Personnel;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonnelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personnel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $departments = ['IT', 'MARKETING', 'HR', 'SERVICES'];
        $civil_status = ['SINGLE', 'MARRIED', 'SEPARATED', 'DIVORCED', 'WIDOW/ER'];
        $gender = ['M', 'F', 'O'];
        return [
            'lastname' => $this->faker->lastname,
            'firstname' => $this->faker->firstname,
            'midname' => $this->faker->lastname,
            'dob' => Carbon::now()->subYear(random_int(18, 60)),
            'date_hired' => now()->subYear(random_int(1, 9)),
            'gender' => $gender[rand(0, 2)],
            'emp_status' => 'REG',
            'department' => $departments[rand(0, count($departments) - 1)],
            'civil_status' => $civil_status[rand(0, count($civil_status) - 1)],
            'address1' => $this->faker->address,
            'address2' => $this->faker->country,
            'email' => $this->faker->unique()->safeEmail,
            'image' => 'https://source.unsplash.com/random/300x300',
        ];
    }
}
