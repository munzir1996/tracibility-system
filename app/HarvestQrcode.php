<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HarvestQrcode extends Model
{

    protected $guarded = [];
    // protected $with = ['cteHarvest'];

    public function cteHarvest()
    {
        return $this->hasOne(CteHarvest::class);
    }

    // public function cteHarvests()
    // {
    //     return $this->hasMany(CteHarvest::class);
    // }

}


