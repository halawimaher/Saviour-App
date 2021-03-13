<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeOfAvailability extends Model
{
    //
    protected $table = "time_of_availabilities";

    protected $fillable = [
        'available_time_slot',

    ];
    public $timestamps = true;
}
