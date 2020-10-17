<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}




