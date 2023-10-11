<?php

namespace Database\Seeders;

use App\Models\Vehicles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        Vehicles::create([
            'model' => "After G",
            'registration_number' => "N 1667 TH",
            'status' => "Available",

        ]);

        Vehicles::create([
            'model' => "Join A",
            'registration_number' => "N 7288 IS",
            'status' => "Available",

        ]);

        Vehicles::create([
            'model' => "Limit N",
            'registration_number' => "N 4418 IS",
            'status' => "Available",

        ]);

        Vehicles::create([
            'model' => "Beast Y",
            'registration_number' => "N 1345 SP",
            'status' => "Available",

        ]);

        Vehicles::create([
            'model' => "Link U",
            'registration_number' => "N 4418 AR",
            'status' => "Available",

        ]);

        Vehicles::create([
            'model' => "Hunter 0",
            'registration_number' => "N 8668 TA",
            'status' => "Available",

        ]);
       
    }
}
