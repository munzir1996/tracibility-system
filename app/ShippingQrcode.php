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


    public function cteTransport()
    {
        return $this->hasOne(CteTransport::class);
    }

    public function cteReceiving()
    {
        return $this->hasOne(CteReceiving::class);
    }

}
