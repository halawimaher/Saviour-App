<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderFeedback extends Model
{
    //
    protected $table = "providers_feedback";

    protected $fillable = [
        'provider_id',
        'feedback',
        'rating'

    ];
    public $timestamps = true;
}
