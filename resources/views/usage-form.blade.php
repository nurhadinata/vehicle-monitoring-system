<form action="{{ route('usage-record.finished', $usage_record->id) }}" method="post">
    @csrf
    @method('POST')
    <div class="row">
        <div class="form-group row">
            <label for="fuel_usage" class="col-sm-5 col-form-label">Bahan Bakar Terpakai </label>
            <div class="col-sm-6">
                <input type="number" step="0.01" class="form-control" id="fuel_usage" name="fuel_usage" value=0>
                <label>liter</label>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>