<?php

namespace BenZee;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['room_number', 'occupancy_type', 'capacity','meter_number'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
