<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\UsageRecord;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $data = [
            'vehicle_counter' => 1,
            'vehicle' => Vehicles::all(),
            'driver_counter' => 1,
            'driver' => Driver::all(),
            'usage_counter' =>1,
            'usage_record' => UsageRecord::all()->where('status', 'On Request'),
        ];
        return view('manager-dashboard', $data);
    }
}
