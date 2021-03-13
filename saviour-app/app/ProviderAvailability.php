<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderAvailability extends Model
{
    //
    protected $table = "provider_availabilities";

    protected $fillable = [
        'provider_id',
        'available_time_slot_id'

    ];
    public $timestamps = true;
}
