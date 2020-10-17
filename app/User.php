<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $with = ['organization'];

    public function getPermissionAttribute()
    {
        return $this->permissions->pluck('name')->first();
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
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

    public function imports()
    {
        return $this->hasMany(Import::class);
    }

    public function transports()
    {
        return $this->hasMany(Transport::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'national_id', 'phone', 'organization_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
