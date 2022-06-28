<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Polres extends Model
{
    protected $table = 'polres';
    use SoftDeletes;

    public function polda()
    {
        return $this->belongsTo(Polda::class);
    }

    public function polsek()
    {
        return $this->hasMany(Polsek::class);
    }

    public function asalTakah()
    {
        return $this->hasMany(AsalTakah::class);
    }

}
