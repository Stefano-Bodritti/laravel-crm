<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    protected $guarded = [];

    public function worker() 
    {
        return $this->hasMany('App\Worker');
    }
}
