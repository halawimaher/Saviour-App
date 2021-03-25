<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = "services";

    protected $fillable = [
        'service',

    ];
    public $timestamps = true;

    public function providers()
    {
        return $this->belongsToMany('App\User', 'provider_services', 'service_id', 'provider_id' );
    }

    public function availability()
    {
        return $this->belongsToMany('App\Provider', 'provider_availabilities', 'available_time_slot_id', 'provider_id' );
    }
}
