<?php

namespace BenZee;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['occupancy_type', 'residency_status','duration', 'institution', 'level', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return '/request/'.$this->id;
    }
}
