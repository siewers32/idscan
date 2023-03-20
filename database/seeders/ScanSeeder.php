<?php

namespace Database\Seeders;

use ArrayObject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ScanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $forgotToCheckoutChance = 7;
        $numberOfDays = 21;
        $persons = DB::table('persons')->select('id')->get()->toArray();
        //$personObject = new ArrayObject($persons); 
        shuffle($persons);
        $personsWhoScan = array_slice($persons, 10, count($persons), true);
        $buildings = DB::table('buildings')->select('id')->get()->toArray();
        $today = Carbon::now();
        $scantime = $today->subDays($numberOfDays);
        $forgotToCheckout = floor($forgotToCheckoutChance / 2);
        for($day = 0; $day < $numberOfDays; $day++) {
            //Not everyone checks in so we remove a few persons from the list....
            //$scanners = $personObject->getArrayCopy();
            //$keys = array_keys($scanners);
            //shuffle($keys); 
            //shuffle($scanners);
            //$personsWhoScan = array_slice($scanners, 10, count($scanners), true);
            //dd($personsWhoScan);
            $scantime->addDays(1);
            foreach($personsWhoScan as $person) {
                $scantime->hour = random_int(6,10);
                $scantime->minute = random_int(0,59);
                $scantime->second = random_int(0,59);
                //Select a building
                $building = random_int(1, count($buildings));
                // checkin
                DB::table('scans')->insert([
                    'person_id' => $person->id,
                    'building_id' => $building,
                    'scantime' => $scantime->format('H:i:s'),
                    'scandate' => $scantime->format('Y-m-d'),
                    'in_out' => 'in',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
                
                if(random_int(1, $forgotToCheckoutChance) != $forgotToCheckout) {
                    //checkout
                    $scantime->hour = random_int(15,20);
                    $scantime->minute = random_int(0,59);
                    $scantime->second = random_int(0,59);
                    DB::table('scans')->insert([
                        'person_id' => $person->id,
                        'building_id' => $building,
                        'scantime' => $scantime->format('H:i:s'),
                        'scandate' => $scantime->format('Y-m-d'),
                        'in_out' => 'out',
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
                
            }
    
        }
    }
}
