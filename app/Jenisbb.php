<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenisbb extends Model
{
    protected $table = 'jenisbb';
    use SoftDeletes;

    public function barang_bukti()
    {
        return $this->hasMany(BarangBukti::class);
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }


}
