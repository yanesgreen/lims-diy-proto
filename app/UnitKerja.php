<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnitKerja extends Model
{
    protected $table = 'unitkerja';
    use SoftDeletes;

    public function pemeriksa()
    {
        return $this->hasMany(Pemeriksa::class);
    }

    public function takah()
    {
        return $this->hasMany(Takah::class);
    }

}
