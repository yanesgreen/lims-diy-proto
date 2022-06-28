<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subbidang extends Model
{
    protected $table = 'subbidang';
    use SoftDeletes;

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function users()
    {
        return $this->hasMany(User::Class);
    }

    public function takah()
    {
        return $this->hasMany(Takah::class);
    }

}
