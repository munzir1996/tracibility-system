<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class CteHarvest extends Model
{

    protected $guarded = [];
    protected $with = ['harvestQrcode', 'user', 'organization'];

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
        // return QrCode::size(100)->generate(Request::url());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function harvestQrcode()
    {
        return $this->belongsTo(HarvestQrcode::class);
    }

}


