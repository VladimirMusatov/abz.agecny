<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $amount_salary = rand(100, 500);

        $amount_salary = $amount_salary. '.00';

        return [
            'name' => $this->faker->name,
            'position_id' => rand(1, 5),
            'date_start_works' => $this->faker->dateTime($max = 'now', $timezone = null),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            // 'employer_id' => rand(1, 5000),
            // 'amount_salary' => $this->faker->randomFloat(2, 100, 500),
            'amount_salary' => $amount_salary,            
            'admin_updated_id' => $this->faker->randomDigitNotNull,
            'admin_created_id' => $this->faker->randomDigitNotNull,
            'photo' => fake()->imageUrl($width=400, $height=400), 
            // 'subordination_level' => rand(1, 5),

        ];
    }
}
