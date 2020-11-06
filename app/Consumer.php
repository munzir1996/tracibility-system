<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Consumer extends Model
{

    protected $guarded = [];

    public function getQrcodeAttribute()
    {
        return QrCode::generate(url("http://192.168.43.40:8000/selling/qrcode/{$this->code}"));
    }

    public function cteSellings()
    {
        return $this->hasMany(CteSelling::class);
    }

}
