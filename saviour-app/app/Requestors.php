<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestors extends Model
{
    //
    protected $table = "requestors";

    protected $fillable = [
        'full_name',
        'phone',
        'image',
        'city_id',
        'latitude',
        'longitude'

    ];
    public $timestamps = true;

    public function feedback()
    {
        return $this->hasMany('App\RequestorFeedback', 'requestor_id', 'id' );
    }
}
