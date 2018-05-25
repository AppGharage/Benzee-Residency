<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['id','user_id', 'amount', 'request_id', 'is_paid', 'end_date'];

    protected $dates = [
        'end_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}
