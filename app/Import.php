<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Import extends Model
{
    protected $guarded = [];
    protected $with = ['cteHarvest', 'user', 'organization'];

    public function scopeReceived($query){
        return $query->where('why', Config::get('constants.delivery.received'));
    }

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

}
