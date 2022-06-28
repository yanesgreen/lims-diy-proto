<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Polda extends Model
{
    protected $table = 'polda';
    use SoftDeletes;

    public function polres()
    {
        return $this->hasMany(Polres::class);
    }

    public function asalTakah()
    {
        return $this->hasMany(AsalTakah::class);
    }

}
