<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    protected $table ="providers";

    protected $fillable = [
        'full_name',
        'city',
        'phone',
        'price_per_hour',
        'works_from',
        "works_till",
        'image',
        'confirmation_docs',
        'approved'
    ];
}
