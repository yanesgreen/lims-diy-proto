<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisIdentitas extends Model
{
    protected $table = 'jenisidentitas';

    public function penyidik()
    {
        return $this->hasMany(Penyidik::class);
    }
}
