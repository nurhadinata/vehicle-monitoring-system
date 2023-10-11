<?php

use Illuminate\Support\Facades\URL;
?>

@extends('layouts.app')

@section('content')
<div class="py-4 px-4">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h4>Data Kendaraan</h4>
            </div>
            <div class="col-8 justify-content-end justify-item-end d-flex pb-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-add-vehicle-lg">Tambah Data</button>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Kendaraan</th>
                <th scope="col" class="text-center">Nomor Polisi</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($vehicle as $value)
                {{-- @if(sizeof($value)>0) --}}
                <th scope="row" class="text-center">{{$vehicle_counter++}}</th>
                <td class="text-center">{{$value->model}}</td>
                <td class="text-center">{{$value->registration_number}}</td>
                <td class="text-center">{{$value->status}}</td>
                <td class="inline-block text-center">
                    <a href="{{route('usage-record.request-form', $value->id)}}"><button class="btn bg-success btn-primary">Request</button></a>
                </td>
                </tr>
                {{-- @endif --}}
            @endforeach

        </tbody>
    </table>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <h4>Data Driver</h4>
            </div>
            <div class="col-8 justify-content-end justify-item-end d-flex pb-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-add-driver-lg">Tambah Data</button>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($driver as $value)
                {{-- @if(sizeof($value)>0) --}}
                <th scope="row" class="text-center">{{$driver_counter++}}</th>
                <td class="text-center">{{$value->first_name}} {{$value->last_name}}</td>
                <td class="text-center">{{$value->status}}</td>
                </tr>
                {{-- @endif --}}
            @endforeach

        </tbody>
    </table>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <h4>Data Penggunaan Kendaraan</h4>
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
                <th scope="col" class="text-center">Update Status</th>

            </tr>
        </thead>
        <tbody>
            
            @foreach ($usage_record as $value)
                {{-- @if(sizeof($value)>0) --}}
                <th scope="row" class="text-center">{{$usage_counter++}}</th>
                <td class="text-center">{{$value->driver->first_name}} {{$value->driver->last_name}}</td>
                <td class="text-center">{{$value->vehicle->model}} : {{$value->vehicle->registration_number}}</td>
                <td class="text-center">{{$value->status}}</td>
                <td class="inline-block text-center">
                    <a href="{{route('usage-record.finish-usage', $value->id)}}"><button class="btn bg-success btn-primary">Finish Usage</button></a>
                </td>
        
                </tr>
                {{-- @endif --}}
            @endforeach
            

        </tbody>
    </table>
</div>

<div class="modal fade bd-add-vehicle-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-header">Register Vehicle</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="{{ route('vehicles.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="form-group row">
                        <label for="model" class="col-sm-5 col-form-label">Model Kendaraan</label>
                        <div class="col-sm-6">
                            <input type="text" step="0.01" class="form-control" id="model" name="model">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group row">
                        <label for="registration_number" class="col-sm-5 col-form-label">Nomor Polisi</label>
                        <div class="col-sm-6">
                            <input type="text" step="0.01" class="form-control" id="registration_number" name="registration_number">
                        </div>
                    </div>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary my-1">Submit</button>
        </form>
    </div>
    </div>
  </div>
</div>

<div class="modal fade bd-add-driver-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-header">Register Vehicle</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="{{ route('driver.store') }}" method="post">
              @csrf
              <div class="row">
                  <div class="col">
                      <div class="form-group row">
                          <label for="first_name" class="col-sm-5 col-form-label">Nama Depan</label>
                          <div class="col-sm-6">
                              <input type="text" step="0.01" class="form-control" id="first_name" name="first_name">
                          </div>
                      </div>
                  </div>
                  <div class="col">
                      <div class="form-group row">
                          <label for="last_name" class="col-sm-5 col-form-label">Nama Belakang</label>
                          <div class="col-sm-6">
                              <input type="text" step="0.01" class="form-control" id="last_name" name="last_name">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="form-group row">
                    <label for="phone_number" class="col-sm-5 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-6">
                        <input type="text" step="0.01" class="form-control" id="phone_number" name="phone_number">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group row">
                    <label for="address" class="col-sm-5 col-form-label">Alamat</label>
                    <div class="col-sm-6">
                        <input type="text" step="0.01" class="form-control" id="address" name="address">
                    </div>
                </div>
              </div>
          
              <button type="submit" class="btn btn-primary my-1">Submit</button>
          </form>
      </div>
      </div>
    </div>
  </div>


  <div class="modal fade bd-example-modal-lg" id="request-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="request-vehicle">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="largeBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // display a modal (small modal)
    $(document).on('click', '#largeButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
                $('#largeBody').html(result).show();
            },
            // return the result
            success: function(result) {
                $('#largeModal').html(result);
                $('#largeBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
                $('#largeBody').html(result).show();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
                $('#largeBody').html(result).show();
            }
            , timeout: 8000
        })
    });
</script>

@endsection