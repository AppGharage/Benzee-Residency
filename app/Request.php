<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = ['name', 'email', 'telephone', 'nationality', 'occupancy', 'resident', 'institution', 'level'];

}
