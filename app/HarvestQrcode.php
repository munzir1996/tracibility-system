<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HarvestQrcode extends Model
{

    protected $guarded = [];

    public function cteHarvests()
    {
        return $this->hasMany(CteHarvest::class);
    }

}


