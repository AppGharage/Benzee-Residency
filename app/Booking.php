<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     protected $fillable = ['id','user_id', 'amount', 'request_id', 'is_paid', 'end_date'];
}
