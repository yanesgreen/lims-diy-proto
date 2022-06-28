<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Takah extends Model
{
    use SoftDeletes;
    protected $table = 'takah';
    protected $guarded = ['id'];

    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }

    public function penyidik()
    {
        return $this->belongsTo(Penyidik::class);
    }

    public function penyidikpenerima()
    {
        return $this->belongsTo(Penyidik::class, 'penyidikpenerima_id');
    }

    public function tersangka()
    {
        return $this->hasMany(Tersangka::class);
    }

    public function saksi()
    {
        return $this->hasMany(Saksi::class);
    }

    public function barangbukti()
    {
        return $this
            ->belongsToMany(BarangBukti::class, 'barangbukti_takah', 'takah_id', 'barangbukti_id');
    }

    public function jeniskasus()
    {
        return $this->belongsTo(JenisKasus::class);
    }

    public function mindik()
    {
        return $this->belongsTo(Mindik::class);
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class)->withTrashed();
    }

    public function subbidang()
    {
        return $this->belongsTo(Subbidang::class)->withTrashed();
    }

    public function mindiktambahan()
    {
        return $this->hasMany(MindikTambahan::class);
    }

    public function asaltakah()
    {
        return $this->belongsTo(AsalTakah::class);
    }

    public function urtu()
    {
        return $this->belongsTo(User::class, 'urtu_id');
    }

    public function urtupenyerah()
    {
        return $this->belongsTo(User::class, 'urtupenyerah_id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id', 'nrp');
    }


    public function detailpermintaan()
    {
        return $this->belongsTo(DetailPermintaan::class);
    }

    public function statustakah()
    {
        return $this->belongsTo(StatusTakah::class);
    }

    public function keteranganformiltambahan()
    {
        return $this->hasOne(KeteranganFormilTambahan::class);
    }

    public function keteranganteknistambahan()
    {
        return $this->hasOne(KeteranganTeknisTambahan::class);
    }

    public function pemeriksa()
    {
        return $this->belongsToMany(Pemeriksa::class);
    }

    public function bap()
    {
        return $this->hasOne(Bap::class);
    }

    public function dokumendiserahkan()
    {
        return $this->hasOne(DokumenDiserahkan::class);
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }

}
