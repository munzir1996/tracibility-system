<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CteReceiving extends Model
{
    protected $guarded = [];

    public function scopeOrganize($query){
        return $query->where('organization_id', auth()->user()->organization_id);
    }

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function cteTransport()
    {
        return $this->belongsTo(CteTransport::class);
    }

    public function shippingQrcode()
    {
        return $this->belongsTo(ShippingQrcode::class);
    }

}
