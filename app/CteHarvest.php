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
        return QrCode::generate(route('harvest.qrcodes.show', $this->harvestQrcode->code));

    }

    public function cteAgent()
    {
        return $this->hasOne(CteAgent::class);
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

    public function import()
    {
        return $this->hasOne(Import::class);
    }

}


