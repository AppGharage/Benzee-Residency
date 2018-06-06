<?php

namespace BenZee;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id', 'payment_type', 'amount_paid',
         'service_fee', 'ref_id', 'narration'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Get Total Payment Amount
    public function totalAmount()
    {
        return  $this->amount_paid + $this->service_fee;
    }
}
