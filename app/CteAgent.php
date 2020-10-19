<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CteAgent extends Model
{
    protected $guarded = [];
    protected $with = ['manafactureQrcode', 'user', 'organization'];

    protected $casts = [
        'what' => 'array',
   ];

    public function scopeReceived($query){
        return $query->whereHas('manafactureQrcode', function (Builder $query) {
            $query->whereIn('status', [Config::get('constants.stock.available'), Config::get('constants.stock.not_available')]);
        });
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
        return QrCode::generate(route('manafacture.qrcodes.show', $this->manafactureQrcode->code));
    }

    public function cteHarvest()
    {
        return $this->belongsTo(CteHarvest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function manafactureQrcode()
    {
        return $this->belongsTo(ManafactureQrcode::class);
    }
}
