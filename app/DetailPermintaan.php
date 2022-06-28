<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPermintaan extends Model
{
    use SoftDeletes;
    protected $table = 'detailpermintaan';
    protected $guarded = ['id'];

    public function takah()
    {
        return $this->hasOne(Takah::class);
    }

}
