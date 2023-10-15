<?php

use Illuminate\Support\Facades\URL;
?>

@extends('layouts.app')

@section('content')

<div class="py-4 px-4">
<form action="{{ route('usage-record.request') }}" method="post">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col">
            <div class="form-group row">
                <h4 for="model" class="col-sm-2 col-form-label">Model</h4>
                <h4 for="model" class="col-sm-2 col-form-label">: {{$vehicle->model}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group row">
                <h4 for="registration_number" class="col-sm-2 col-form-label">Nomor Polisi</h4>
                <h4 for="registration_number" class="col-sm-2 col-form-label">: {{$vehicle->registration_number}}</h4>
            </div>
        </div>
    </div>
    
    <div class="row">
            <div class="input-group mb-3">
                <h4 for="driver_id" class="col-sm-2 col-form-label">Driver</h4>
                <h4 for="driver_id" class="col-sm-0 col-form-label">: </h4>
                <select class="custom-select col-sm-4" id="driver_id" name="driver_id">
                    <option selected>Choose...</option>
                    @foreach ($driver as $value)
                    <?php if($value->status == "Idle"){ ?>
                        <option value="{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</option>
                    <?php } ?>
                    @endforeach
                </select>
                <input id ="vehicle_id" name="vehicle_id" type="hidden" value={{$vehicle->id}}>
            </div>

    <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>
</div>

@endsection