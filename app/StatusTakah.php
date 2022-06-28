<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusTakah extends Model
{
    protected $table = 'statustakah';
    protected $guarded = ['id'];

    public function takah()
    {
        return $this->hasMany(Takah::class);
    }

}
