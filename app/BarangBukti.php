<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangBukti extends Model
{
    use SoftDeletes;
    protected $table = 'barangbukti';
    protected $guarded = ['id'];

    public function jenisbb()
    {
        return $this->belongsTo(Jenisbb::class);
    }

    public function takah()
    {
        return $this
            ->belongsToMany(Takah::class, 'barangbukti_takah', 'barangbukti_id', 'takah_id');
    }

}
