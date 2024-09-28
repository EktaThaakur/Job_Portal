<?php

namespace Database\Factories;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'company_name' => $this->faker->company,
            'company_detail' => $this->faker->paragraph(5),
            'company_address' => $this->faker->address,
            'company_logo' => $this->faker->imageUrl(640, 480, 'business', true)

        ];
    }
}