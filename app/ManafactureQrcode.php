<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManafactureQrcode extends Model
{
    protected $guarded = [];

    public function cteAgent()
    {
        return $this->hasOne(CteAgent::class);
    }

}





