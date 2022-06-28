<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pangkat extends Model
{
    protected $table = 'pangkat';
    use SoftDeletes;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pemeriksa()
    {
        return $this->hasMany(Pemeriksa::class);
    }

    public function penyidik()
    {
        return $this->hasMany(Penyidik::class);
    }

}
