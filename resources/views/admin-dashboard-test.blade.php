
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
                <td class="text-nowrap text-center">
                    <button class="btn bg-warning" data-toggle="modal" id="largeButton" data-target="#largeModal" data-attr="{{ route('usage-record.request-form', $value->id) }}" title="Edit Project">
                        <i class="fa fa-pen"></i>
                    </button>
                    <button class="btn btn-danger" data-toggle="modal" id="smallButton" data-target="#smallModal" data-attr="{{ route('usage-record.request-form', $value->id) }}" title="Delete Project">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
                </tr>
                {{-- @endif --}}
            @endforeach

        </tbody>
    </table>

</div>
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });
</script>

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
            },
            // return the result
            success: function(result) {
                $('#largeModal').modal("show");
                $('#largeBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });
</script>
</div>

</div>
</div>
</div>
@endsection