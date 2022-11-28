<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = Faker\Factory::create('nl_NL');
        $gender = (random_int(0,1))?'male':'female';
        return [
            'title' => $faker->title($gender),
            'firstname' => $faker->firstName($gender),
            'lastname' => $faker->lastName(),
            'email' => $faker->email(),
            'jobtitle' => $faker->jobTitle(),
        ];
    }
}
