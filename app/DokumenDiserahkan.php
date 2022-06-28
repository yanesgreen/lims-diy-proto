<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DokumenDiserahkan extends Model
{
    protected $table = 'dokumendiserahkan';
    protected $guarded = ['id'];

    public function takah()
    {
        return $this->belongsTo(Takah::class);
    }

}
