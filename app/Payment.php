<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id', 'payment_type', 'amount_paid', 'service_fee', 'ref_id', 'narration'];
}
