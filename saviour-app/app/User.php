<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password', 'phone', 'city', 'image', 'address', 'personal_message',  'role_id'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }    


    public function requestorFeedback()
    {
        return $this->hasMany('App\RequestorFeedback', 'requestor_id', 'id' );
    }
    public function providerFeedback()
    {
        return $this->hasMany('App\ProviderFeedback', 'provider_id', 'id' );
    }

    public function services()
    {
        return $this->belongsToMany('App\Service', 'provider_services', 'provider_id', 'service_id' );
    }

    public function providerBookings()
    {
        return $this->hasMany('App\Booking', 'provider_id', 'id' );
    }

    public function requestorBookings()
    {
        return $this->hasMany('App\Booking', 'requestor_id', 'id' );
    }
  }
