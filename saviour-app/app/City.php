<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table ="cities";

    protected $fillable = [
        'city',
        
    ];

    public $timestamps = true;

    public function providerResidents()
    {
        return $this->hasMany('App\User');
    }
    
    public function requestorResidents()
    {
        return $this->hasMany('App\User');
    }
    
}
