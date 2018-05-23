<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['occupancy_type', 'residency_status', 'institution', 'level', 'user_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
