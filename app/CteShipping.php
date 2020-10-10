<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CteShipping extends Model
{
    protected $guarded = [];
    protected $with = ['shippingQrcode', 'user', 'organization'];

    protected $casts = [
        'what' => 'array',
   ];

    public function getWhatAttribute($value)
    {
        return json_decode($value);
    }

    public function setWhatAttribute($value)
    {
        $this->attributes['what'] = json_encode($value, true);
    }

    public function getQrcodeAttribute()
    {
        return QrCode::generate(route('shipping.qrcodes.show', $this->shippingQrcode->code));
    }

    public function cteAgent()
    {
        return $this->belongsTo(CteAgent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function shippingQrcode()
    {
        return $this->belongsTo(ShippingQrcode::class);
    }

}


