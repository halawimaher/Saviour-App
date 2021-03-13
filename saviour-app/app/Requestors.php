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

    ];
    public $timestamps = true;
}
