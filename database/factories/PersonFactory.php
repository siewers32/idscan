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
        $faker = \Faker\Factory::create('nl_NL');
        $gender = (random_int(0, 1)) ? 'male' : 'female';
        $domain = 'superduper-markets.com';
        $jobtitles = $this->createJobTitles();
        $titles = $this->createTitles($gender);
        $firstName = $faker->firstName($gender);
        $lastName = $faker->lastName($gender);
        $email = strtolower(substr($firstName, 0, 1) . preg_replace('/\s+/', '', $lastName) . "@superduper.com");

        $title = ($gender == 'male') ? "dhr" : "mevr.";
        $jobseeker = random_int(0, (count($jobtitles) - 1));
        $titleseeker = random_int(0, (count($titles) - 1));
        return [
            'title' => $titles[$titleseeker],
            'firstname' => $firstName,
            'lastname' => $lastName,
            'email' => $email,
            'jobtitle' => $jobtitles[$jobseeker],
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

    public function createTitles($gender) {
        $titles = [
            'dhr.' => 10,
            'mevr.' => 10,
            'ir.' => 2,
            'ing.' => 4,
            'prof.' => 2,
            'drs.' => 4,
            'dr.' => 3,
            'ds.' => 1, //Dominee
            'mr.' =>1, //Meester in de rechten
        ];
        $title['dhr.'] = ($gender == 'male') ? 10 : 0;
        $title['mevr.'] = ($gender == 'female') ? 10 : 0;

        foreach($titles as $title => $number) {
            for ($i = 0; $i < $number; $i++) {
                $tts[] = $title;
            }
        }
        return $tts;
    }
}
