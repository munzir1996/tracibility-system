<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CteTransport extends Model
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

    public function cteShipping()
    {
        return $this->belongsTo(CteShipping::class);
    }

    public function shippingQrcode()
    {
        return $this->belongsTo(ShippingQrcode::class);
    }

    public function cteReceivings()
    {
        return $this->hasOne(CteReceiving::class);
    }


}
