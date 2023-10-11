<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\UsageRecord;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'vehicle_counter' => 1,
            'vehicle' => Vehicles::all(),
            'driver_counter' => 1,
            'driver' => Driver::all(),
            'usage_counter' =>1,
            'usage_record' => UsageRecord::all(),
        ];
        return view('admin-dashboard', $data);
    }
}
