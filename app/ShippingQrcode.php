<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingQrcode extends Model
{
    protected $guarded = [];

    public function cteShipping()
    {
        return $this->hasOne(CteShipping::class);
    }


    public function cteTransports()
    {
        return $this->hasMany(CteTransport::class);
    }

}
