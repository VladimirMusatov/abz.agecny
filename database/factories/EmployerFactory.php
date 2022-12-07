<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        Storage::makeDirectory('/public/image/users');

        return [
            'name' => $this->faker->name,
            'job' => 'test',
            'date_start_works' => $this->faker->dateTime($max = 'now', $timezone = null),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail(),
            'amount_salary' => $this->faker->randomFloat(8, 10 ,10),
            'admin_updated_id' => $this->faker->randomDigit,
            'admin_created_id' => $this->faker->randomDigit,
            'photo' => fake()->imageUrl($width=400, $height=400), 

        ];
    }
}
