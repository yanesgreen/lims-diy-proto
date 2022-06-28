<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MindikTambahan extends Model
{
    use SoftDeletes;
    protected $table = 'mindiktambahan';
    protected $guarded = ['id'];

    public function takah()
    {
        return $this->belongsTo(Takah::class);
    }

}
