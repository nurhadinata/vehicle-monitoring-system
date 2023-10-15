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
            'vehicle' => Vehicles::orderBy('id', 'ASC')->paginate(5, ['*'], 'vehicle'),
            'driver_counter' => 1,
            'driver' => Driver::orderBy('id', 'ASC')->paginate(5, ['*'], 'driver'),
            'usage_counter' =>1,
            'usage_record' => UsageRecord::orderBy('updated_at', 'DESC')->where('status', 'On Request')->get(),
        ];
        return view('manager-dashboard', $data);
    }
}
