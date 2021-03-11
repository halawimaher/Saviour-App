<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    //
    protected $table = "feedback";

    protected $fillable = [
        'provider_id',
        'feedback'

    ];
    public $timestamps = true;
}
