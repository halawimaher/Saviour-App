<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestorFeedback extends Model
{
    //
    protected $table = "requestors_feedback";

    protected $fillable = [
        'requestor_id',
        'feedback',
        'rating'

    ];
    public $timestamps = true;
}
