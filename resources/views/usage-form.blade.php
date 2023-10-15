<?php

use Illuminate\Support\Facades\URL;
?>

@extends('layouts.app')

@section('content')
<form action="{{ route('usage-record.finished', $usage_record->id) }}" method="post">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col">
            <h4 for="fuel_usage" class="col-sm-4 col-form-label">Bahan Bakar Terpakai </h4>
            <input type="number" step="0.1" class="col-form-control-sm-4" id="fuel_usage" name="fuel_usage" value=0>
            <label>liter</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>
@endsection