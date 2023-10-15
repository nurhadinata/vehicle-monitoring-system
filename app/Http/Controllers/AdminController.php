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
        $usageStatus = ["On Request", "Request Accepted", "Running"];
        $data = [
            'vehicle_counter' => 1,
            'vehicle' => Vehicles::orderBy('id', 'ASC')->paginate(5, ['*'], 'vehicle'),
            'driver_counter' => 1,
            'driver' => Driver::orderBy('id', 'ASC')->paginate(5, ['*'], 'driver'),
            'usage_counter' =>1,
            'usage_record' => UsageRecord::orderBy('updated_at', 'DESC')->whereIn('status', $usageStatus)->paginate(5, ['*'], 'record'),
        ];
        return view('admin-dashboard', $data);
    }
}
