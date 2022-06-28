<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tersangka extends Model
{
    protected $table = 'tersangka';
    protected $guarded = ['id'];

    public function takah()
    {
        return $this->belongsTo(Takah::class);
    }

}
