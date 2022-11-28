<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker\Factory::create('nl_NL');
        return [
            'buildingname' => $faker->company(),
            'street' => $faker->streetName(),
            'buildingnumber' => $faker->buildingNumber()
        ];
    }
}
