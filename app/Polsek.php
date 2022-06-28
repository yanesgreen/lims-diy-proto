<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Polsek extends Model
{
    protected $table = 'polsek';
    use SoftDeletes;

    public function polres()
    {
        return $this->belongsTo(Polres::class);
    }

    public function asalTakah()
    {
        return $this->hasMany(AsalTakah::class);
    }

}
