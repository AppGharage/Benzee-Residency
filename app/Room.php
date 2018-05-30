<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['room_number', 'occupancy_type', 'capacity'];
}
