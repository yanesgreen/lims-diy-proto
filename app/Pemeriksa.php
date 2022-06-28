<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemeriksa extends Model
{
    protected $table = 'pemeriksa';
    use SoftDeletes;

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }

    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }

    public function takah()
    {
        return $this->belongsToMany(Takah::class);
    }

}
