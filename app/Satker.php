<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satker extends Model
{
    protected $table = 'satker';
    use SoftDeletes;

    public function asalTakah()
    {
        return $this->hasMany(AsalTakah::class);
    }

}
