<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $guarded = [];
    protected $with = ['cteHarvest', 'user', 'organization'];

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
