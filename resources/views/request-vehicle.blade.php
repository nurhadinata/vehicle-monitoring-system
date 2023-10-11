<form action="{{ route('usage-record.request') }}" method="post">
    @csrf
    @method('POST')
    <div class="row">
        <div class="col">
            <div class="form-group row">
                <label for="model" class="col-sm-5 col-form-label">Model : </label>
                <label for="model" class="col-sm-5 col-form-label">{{$vehicle->model}}</label>
            </div>
        </div>
        <div class="col">
            <div class="form-group row">
                <label for="registration_number" class="col-sm-5 col-form-label">Nomor Polisi : </label>
                <label for="registration_number" class="col-sm-5 col-form-label">{{$vehicle->registration_number}}</label>
                
            </div>
        </div>
    </div>
    
    <div class="row">
            <div class="form-group row">
                <label for="driver_id" class="col-sm-5 col-form-label">Driver</label>
                <select class="custom-select col-sm-6" id="driver_id" name="driver_id">
                    <option selected>Choose...</option>
                    @foreach ($driver as $value)
                    <option value="{{$value->id}}">{{$value->first_name}} {{$value->last_name}}</option>
                    @endforeach
                </select>
                <input id ="vehicle_id" name="vehicle_id" type="hidden" value={{$vehicle->id}}>
            </div>

    <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>