<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderRating extends Model
{
    //
    protected $table = "provider_ratings";

    protected $fillable = [
        'provider_id',
        'rating'

    ];
    public $timestamps = true;
}
