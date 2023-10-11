<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\UsageRecord;
use App\Models\Vehicles;
use App\Exports\UsageRecordExport;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use ConsoleTVs\Charts\charts;
use DB;

class UsageRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UsageRecord $usageRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsageRecord $usageRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsageRecord $usageRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsageRecord $usageRecord)
    {
        //
    }

    public function requestForm($id)
    {
        $data = [
            'vehicle' => Vehicles::find($id),
            'driver' => Driver::all(),
        ];
        return view('request-vehicle', $data)->render();
    }

    public function request(Request $request)
    {
        UsageRecord::create([
            'vehicle_id' => $request->vehicle_id,
            'driver_id' =>$request->driver_id,
            'admin_id' => null, 
            'manager_id' => null,
            'status' => "On Request",
            'start_time' => null,
            'finish_time' => null,
            'fuel_usage' => 0, 
            'task' => $request->task, 
        ]);

        $vehicleId = $request->vehicle_id;
        $vehicle = Vehicles::find($vehicleId);
        $vehicle->id = $vehicleId;
        $vehicle->status = "Requested";
        $vehicle->save();

        return redirect()->route('admin')
                        ->with('success','Input data sukses');
    }

    public function requestList()
    {
        $data = [
            'request_list' => UsageRecord::where('status', "On Request")
        ];

        return view('request-list', $data);
    }

    public function acceptRequest($id)
    {
        $usageRecord = UsageRecord::find($id);
        $usageRecord->id = $id;
        $usageRecord->status = "Request Accepted";
        $usageRecord->start_time = Carbon::now();
        $usageRecord->save();

        $vehicleId = $usageRecord->vehicle_id;
        $vehicle = Vehicles::find($vehicleId);
        $vehicle->id = $vehicleId;
        $vehicle->status = "Is Used";
        $vehicle->save();

        $driverId = $usageRecord->driver_id;
        $driver = Driver::find($driverId);
        $driver->status = "On Road";
        $driver->save();

        return redirect()->back()->with('success', 'Request Accepted');
    }

    public function finishUsage($id)
    {
        $data = [
            'usage_record' => UsageRecord::find($id),
        ];

        return view('usage-form', $data);
    }
    
    public function finished(Request $request, $id)
    {
        $usageRecord = UsageRecord::find($id);
        $usageRecord->id = $id;
        $usageRecord->fuel_usage = $request->fuel_usage;
        $usageRecord->status = "Done";
        $usageRecord->finish_time = Carbon::now();
        $usageRecord->save();

        $driverId = $usageRecord->driver_id;
        $driver = Driver::find($driverId);
        $driver->status = "Idle";
        $driver->save();

        $vehicleId = $usageRecord->vehicle_id;
        $vehicle = Vehicles::find($vehicleId);
        $vehicle->id = $vehicleId;
        $vehicle->status = "Available";
        $vehicle->save();

        return redirect()->route('admin')
                        ->with('success','Input data sukses');
    }

    public function export() 
    {
        return Excel::download(new UsageRecordExport, 'users.xlsx');
    }
}
