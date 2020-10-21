<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CteSelling extends Model
{

    protected $guarded = [];

    protected $casts = [
        'what' => 'array'
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
        return QrCode::generate(route('harvest.qrcodes.show', $this->harvestQrcode->code));

    }

    public function consumer()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
