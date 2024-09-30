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
    // public function definition(): array
    // {
    //     return [
    //         'job_name' => $this->faker->jobTitle,
    //         'job_description' => $this->faker->paragraph,
    //         'qualifications' => $this->faker->sentence,
    //         'responsibility' => $this->faker->paragraph,
    //         'published_date' => $this->faker->date(),
    //         'vacancy' => $this->faker->numberBetween(1, 10),
    //         'job_nature' => $this->faker->word,
    //         'salary' => $this->faker->randomFloat(2, 30000, 100000),
    //         'location' => $this->faker->city,
    //         'date_line' => $this->faker->date(),
    //         'company_id' => $this->faker->numberBetween(1, 10),
    //     ];
    // }
    public function definition(): array
    {
        return [
            'job_name' => $this->faker->jobTitle,
            'job_description' => $this->faker->paragraph,
            'qualifications' => $this->faker->randomElement([
                'Bachelor’s Degree in Engineering',
                'MBA',
                'Master’s in Computer Science',
                'B.Sc',
                'Diploma in Mechanical Engineering'
            ]),
            'responsibility' => $this->faker->paragraph,
            'published_date' => $this->faker->date(),
            'vacancy' => $this->faker->numberBetween(1, 10),
            'job_nature' => $this->faker->randomElement(['Full-time', 'Part-time', 'Contractual', 'Internship']),
            'salary' => $this->faker->randomFloat(2, 3000, 200000), // Indian Rupees, increased range
            'location' => $this->faker->randomElement([
                'Mumbai',
                'Delhi',
                'Bangalore',
                'Hyderabad',
                'Chennai',
                'Pune',
                'Kolkata',
                'Ahmedabad'
            ]),
            'date_line' => $this->faker->date(),
            'company_id' => $this->faker->numberBetween(1, 10), // Assuming company IDs in your database range from 1 to 10
        ];
    }

}