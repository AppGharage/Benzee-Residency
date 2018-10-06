<?php

namespace BenZee;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password', 'is_admin','telephone', 'nationality'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function routeNotificationForSMS()
    {
        return $this->telephone; // where phone is a cloumn in your users table;
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }
}
