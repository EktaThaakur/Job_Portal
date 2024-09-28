<?php

namespace Database\Factories;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_name' => $this->faker->jobTitle,
            'job_description' => $this->faker->paragraph,
            'qualifications' => $this->faker->sentence,
            'responsibility' => $this->faker->paragraph,
            'published_date' => $this->faker->date(),
            'vacancy' => $this->faker->numberBetween(1, 10),
            'job_nature' => $this->faker->word,
            'salary' => $this->faker->randomFloat(2, 30000, 100000),
            'location' => $this->faker->city,
            'date_line' => $this->faker->date(),
            'company_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}