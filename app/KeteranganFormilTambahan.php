<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeteranganFormilTambahan extends Model
{
    use SoftDeletes;
    protected $table = 'keteranganformiltambahan';
    protected $guarded = ['id'];

    public function takah()
    {
        return $this->belongsTo(Takah::class);
    }

}
