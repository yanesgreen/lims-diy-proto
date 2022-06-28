<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeteranganTeknisTambahan extends Model
{
    use SoftDeletes;
    protected $table = 'keteranganteknistambahan';
    protected $guarded = ['id'];

    public function takah()
    {
        return $this->belongsTo(Takah::class);
    }

}
