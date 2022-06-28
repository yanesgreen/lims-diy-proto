<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function subbidang()
    {
        return $this->belongsTo(Subbidang::class);
    }

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }

    public function takahUrtu()
    {
        return $this->hasMany(Takah::class, 'urtu_id');
    }

    public function takahUrtuPenyerah()
    {
        return $this->hasMany(Takah::class, 'urtupenyerah_id');
    }

    public function takahPenerima()
    {
        return $this->hasMany(Takah::class, 'penyidikpenerima_id');
    }

    public function takahEditor()
    {
        return $this->hasMany(Takah::class, 'nrp', 'nrp');
    }

}
