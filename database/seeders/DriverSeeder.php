<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        Driver::create([
            'first_name' => "Alfa",
            'last_name' => "Midi",
            'phone_number' => "12475553",
            'address' => "Far-Far Away",
            'join_date' => date_create('2009-07-01'), 
            'status' => "Idle",
        ]);

        Driver::create([
            'first_name' => "Ryan",
            'last_name' => "Artawan",
            'phone_number' => "12475113",
            'address' => "Far-Far Away",
            'join_date' => date_create('2009-08-01'), 
            'status' => "Idle",
        ]);

        Driver::create([
            'first_name' => "Han",
            'last_name' => "Arman",
            'phone_number' => "859787t9",
            'address' => "Far-Far Away",
            'join_date' =>date_create('2008-07-01'), 
            'status' => "Idle",
        ]);

        Driver::create([
            'first_name' => "Lost",
            'last_name' => "Island",
            'phone_number' => "87565769",
            'address' => "Far-Far Away",
            'join_date' => date_create('2008-07-19'), 
            'status' => "Idle",
        ]);

        Driver::create([
            'first_name' => "Prima",
            'last_name' => "Harta",
            'phone_number' => "87535769",
            'address' => "Far-Far Away",
            'join_date' => date_create('2008-06-01'), 
            'status' => "Idle",
        ]);

        Driver::create([
            'first_name' => "Rick",
            'last_name' => "Roll",
            'phone_number' => "81235769",
            'address' => "Far-Far Away",
            'join_date' => date_create('2004-07-01'), 
            'status' => "Idle",
        ]);
       
    }
    
}
