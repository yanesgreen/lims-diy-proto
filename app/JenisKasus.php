<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKasus extends Model
{
    use SoftDeletes;
    protected $table = 'jeniskasus';

    public function takah()
    {
        return $this->hasMany(Takah::class);
    }

}
