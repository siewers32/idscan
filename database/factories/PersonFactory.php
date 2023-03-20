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
        $gender = (random_int(0, 1)) ? 'male' : 'female';
        $firstName = $faker->firstName($gender);
        $lastName = $faker->lastName($gender);
        $email = strtolower(substr($firstName, 0, 1) . preg_replace('/\s+/', '', $lastName) . "@superduper.com");
        $jobTitles = [
            "Productieplanner",
            "Loopbaancoach",
            "Productiebegeleider",
            "Advocaat",
            "Corrector",
            "Systeemprogrammeur",
            "Onderzoeker",
            "Bedrijfsorganisatiedeskundige",
            "Bedrijfsleider"
        ];
        $title = ($gender == 'male') ? "dhr." : "mevr.";
        $titles = [
            "ds.",
            "dr.",
            "ing.",
            "mr.",
            "ir.",
            "ds.",
            "drs",
            "prof.",
            $title,
            $title,
            $title,
            $title,
            $title
        ];
        $title = ($gender == 'male') ? "dhr" : "mevr.";
        $jobseeker = random_int(0, (count($jobTitles) - 1));
        $titleseeker = random_int(0, (count($titles) - 1));
        return [
            'title' => $titles[$titleseeker],
            'firstname' => $firstName,
            'lastname' => $lastName,
            'email' => $email,
            'jobtitle' => $jobTitles[$jobseeker],
        ];
    }
}
