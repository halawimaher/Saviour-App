<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderServices extends Model
{
    //
    protected $table = "provider_services";

    protected $fillable = [
        'provider_id',
        'service_id'

    ];
    public $timestamps = true;
}
