<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mindik extends Model
{
    use SoftDeletes;
    protected $table = 'mindik';
    protected $guarded = ['id'];

    public function takah()
    {
        return $this->hasOne(Takah::class);
    }

}
