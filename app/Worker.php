<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $guarded = [];

    public function firm()
    {
        return $this->belongsTo('App\Firm');
    }
}
