<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Organization extends Model
{
    protected $guarded = [];

    public function scopePermissionType($query, $permission){

        if ($permission == 'harvest') {
            return $query->where('type', Config::get('constants.type.harvest'));
        }
        if ($permission == 'manafacture') {
            return $query->where('type', Config::get('constants.type.agent'));
        }
        if ($permission == 'receiving') {
            return $query->where('type', Config::get('constants.type.bakery'));
        }
        if ($permission == 'transporting') {
            return $query->where('type', Config::get('constants.type.transport'));
        }

    }

    public function getQrcodeAttribute()
    {
        return QrCode::generate(route('organization.qrcode', $this->id));
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function cteHarvests()
    {
        return $this->hasMany(CteHarvest::class);
    }

    public function cteAgents()
    {
        return $this->hasMany(CteAgent::class);
    }

    public function cteShippings()
    {
        return $this->hasMany(CteShipping::class);
    }

    public function transports()
    {
        return $this->hasMany(Transport::class);
    }


    public function cteTransports()
    {
        return $this->hasMany(CteTransport::class);
    }

    public function cteReceivings()
    {
        return $this->hasMany(CteReceiving::class);
    }

}
