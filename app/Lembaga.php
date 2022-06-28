<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'lembaga';

    public function asalTakah()
    {
        return $this->hasMany(AsalTakah::class);
    }

}
