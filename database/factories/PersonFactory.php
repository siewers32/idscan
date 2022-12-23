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
        $jobtitles = $this->createJobTitles();
        $faker = Faker\Factory::create('nl_NL');
        $gender = (random_int(0,1))?'male':'female';
        return [
            'title' => $faker->title($gender),
            'firstname' => $faker->firstName($gender),
            'lastname' => $faker->lastName(),
            'email' => $faker->email(),
            'jobtitle' => $faker->randomElement($jobtitles),
        ];
    }

    public function createJobTitles() {
        $jobtitles = [
            "projectleider" => 3,
            "verkoopassistent" => 12,
            "kassamedewerker" => 7,
            "supervisor" => 4,
            "medewerker M&O" => 5,
            "kwaliteitsmanager" => 2,
            "magazijnmedewerker" => 9,
            "medewerker communicatie" => 5,
            "directeur" => 1,
            "hoofd administratie" => 1,
            "medewerker administratie" => 22,
            "commercieel directeur" => 1,
            "medewerker salarisadministratie" => 2,
            "verkoopadviseur" => 5
        ];
        foreach($jobtitles as $title => $number) {
            for ($i = 0; $i < $number; $i++) {
                $jts[] = $title;
            }
        }
        return $jts;
    }
}
