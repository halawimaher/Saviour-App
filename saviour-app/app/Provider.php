<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $table ="providers";

    protected $fillable = [
        'full_name',
        'city_id',
        'phone',
        'price_per_hour',
        'works_from',
        "works_till",
        'image',
        'confirmation_docs',
        'approved'
    ];

    public $timestamps = true;

    public function location()
    {
        return $this->hasOne('App\City', 'id', 'city_id');
    }

    public function feedback()
    {
        return $this->hasMany('App\ProviderFeedback', 'provider_id', 'id' );
    }

    public function services()
    {
        return $this->belongsToMany('App\Service', 'provider_services', 'provider_id', 'service_id' );
    }

    public function availability()
    {
        return $this->belongsToMany('App\TimeOfAvailability', 'provider_availabilities', 'provider_id', 'available_time_slot_id' );
    }
}
