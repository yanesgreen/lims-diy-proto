<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penyidik extends Model
{
    protected $table = 'penyidik';
    use SoftDeletes;
    protected $guarded = ['id'];

    public function jenisidentitas()
    {
        return $this->belongsTo(JenisIdentitas::class);
    }

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class);
    }

    public function takah()
    {
        return $this->hasMany(Takah::class);
    }

    public function takahPenyidikPenerima()
    {
        return $this->hasMany(Takah::class, 'penyidikpenerima_id');
    }

}
