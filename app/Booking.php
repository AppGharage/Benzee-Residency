<?php

namespace BenZee;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['id','user_id', 'amount', 'request_id', 'is_paid', 'end_date'];

    protected $dates = [
        'end_date', 'fee_end_date'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function paymentPath()
    {
        return '/booking/pay/'.$this->id;
    }

    public function roomAssignPath()
    {
        return '/booking/assign/'.$this->id;
    }
}
