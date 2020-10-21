<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Consumer extends Model
{

    protected $guarded = [];

    public function getQrcodeAttribute()
    {
        return QrCode::generate(route('selling.qrcodes.show', $this->code));
    }

    public function cteSellings()
    {
        return $this->hasMany(CteSelling::class);
    }

}
