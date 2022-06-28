<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    use SoftDeletes;

    public function users()
    {
        return $this->hasMany(User::Class);
    }

}
