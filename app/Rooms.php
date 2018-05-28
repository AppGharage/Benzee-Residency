<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    protected $fillable = ['room_number', 'occupancy_type', 'capacity'];
}
