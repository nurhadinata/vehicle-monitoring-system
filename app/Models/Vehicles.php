<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    public $table ="vehicles";
    use HasFactory;

    public function usageRecord(){
        return $this->hasMany(UsageRecord::class);
    }

    protected $fillable = [
        'model',
        'registration_number', 
        'status',
    ];
}
