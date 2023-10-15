<?php

use Illuminate\Support\Facades\URL;
?>

@extends('layouts.app')

@section('content')
<div class="py-4 px-4">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h4>Record Penggunaan Kendaraan</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <a href="{{route('usage-record.export')}}"><button class="btn bg-success btn-primary">Download Data</button></a>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama Driver</th>
                <th scope="col" class="text-center">Kendaraan</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Waktu Mulai</th>
                <th scope="col" class="text-center">Waktu Selesai</th>
                <th scope="col" class="text-center">BBM Terpakai</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($usage_record as $value)
                {{-- @if(sizeof($value)>0) --}}
                <th scope="row" class="text-center">{{$usage_counter++}}</th>
                <td class="text-center">{{$value->driver->first_name}} {{$value->driver->last_name}}</td>
                <td class="text-center">{{$value->vehicle->model}} : {{$value->vehicle->registration_number}}</td>
                <td class="text-center">{{$value->status}}</td>
                <td class="text-center">{{$value->start_time}}</td>
                <td class="text-center">{{$value->finish_time}}</td>
                <td class="text-center">{{$value->fuel_usage}}</td>

        
                </tr>
                {{-- @endif --}}
            @endforeach
            

        </tbody>
    </table>
    <div>
        {!! $usage_record->links('pagination::bootstrap-5') !!}
    </div>
</div>
@endsection