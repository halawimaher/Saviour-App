<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $table = "bookings";

    protected $fillable = [
        'requestor_id',
        'provider_id',
        'longitude',
        'latitude',
        'status'
        

    ];
    public $timestamps = true;
}
