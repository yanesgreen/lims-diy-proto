<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bidang extends Model
{
    protected $table = 'bidang';
    use SoftDeletes;

    public function users()
    {
        return $this->hasMany(User::Class);
    }

    public function pemeriksa()
    {
        return $this->hasMany(Pemeriksa::Class);
    }

    public function subbidang()
    {
        return $this->hasMany(Subbidang::class);
    }

    public function jenisbb()
    {
        return $this->hasMany(Jenisbb::class);
    }

    public function takah()
    {
        return $this->hasMany(Takah::class);
    }

}
