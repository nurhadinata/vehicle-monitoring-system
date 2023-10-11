<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsageRecord extends Model
{
    public $table ="usage_records";
    use HasFactory;

    public function driver(){
        return $this->belongsTo(Driver::class);
    }

    public function vehicle(){
        return $this->belongsTo(Vehicles::class);
    }

    protected $fillable = [
        'driver_id',
        'vehicle_id',
        'status',
        'start_time',
        'finish_time',
        'fuel_usage',
        'task', 
    ];
}
