<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AsalTakah extends Model
{
    protected $table = 'asaltakah';
    protected $guarded = ['id'];

    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }

    public function polda()
    {
        return $this->belongsTo(Polda::class);
    }

    public function polres()
    {
        return $this->belongsTo(Polres::class);
    }

    public function polsek()
    {
        return $this->belongsTo(Polsek::class);
    }

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class);
    }

    public function takah()
    {
        return $this->hasOne(Takah::class);
    }

}
