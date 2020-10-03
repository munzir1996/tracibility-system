<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

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

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
