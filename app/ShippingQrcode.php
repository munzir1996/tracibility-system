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
}
