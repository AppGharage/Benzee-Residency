<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['occupancy', 'resident', 'institution', 'level'];

    public function user()
    {
    	//return $this belongsTo(User::class);
    }

}
