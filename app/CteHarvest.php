<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CteHarvest extends Model
{

    protected $guarded = [];

    public function getWhatAttribute($value)
    {
        return json_decode(json_decode($value));
    }

    public function setWhatAttribute($value)
    {
        $this->attributes['what'] = json_encode($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function harvestQrcode()
    {
        return $this->belongsTo(HarvestQrcode::class);
    }

}


