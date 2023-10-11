<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public $table ="drivers";
    use HasFactory;

    public function usageRecord(){
        return $this->hasMany(UsageRecord::class);
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'join_date', 
        'status',
    ];
}
