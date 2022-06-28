<?php

namespace App\Http\Controllers;

use App\Penyidik;
use App\Takah;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TakahProcessFlowController extends Controller
{
    public function serahkanKeKaurmin(Takah $takah)
    {
        // update status takah
        $takah->statustakah_id = 2;
        $takah->tahap = 2;
        $takah->diserahkan_ke_kaurmin_at = Carbon::now();
        // save data
        $takah->update();

        return $response = ['message' => 'Takah Berhasil Diserahkan Ke Kaurmin'];
    }

    public function tambahKelengkapanTakah(Request $request, Takah $takah)
    {

        // validation rules
        $rules = [
            'kasus_menonjol' => 'required',
            'kelengkapan_formil' => 'required',
            'kelengkapan_teknis' => 'required',
            'pemeriksaantkp' => 'required',
        ];
        $this->validate($request, $rules);

        // keterangan formil tambahan
        if ($request->keterangan_formil_tambahan) {
            $keterangan_formil_tambahan = $takah->keteranganformiltambahan()->create([
                'nama' => $request->keterangan_formil_tambahan,
            ]);
        } else {
            $keterangan_formil_tambahan = null;
        }

        // keterangan teknis tambahan
        if ($request->keterangan_teknis_tambahan) {
            $keterangan_teknis_tambahan = $takah->keteranganteknistambahan()->create([
                'nama' => $request->keterangan_teknis_tambahan,
            ]);
        } else {
            $keterangan_teknis_tambahan = null;
        }

        // update kasus menonjol & pemeriksaan tkp
        $takah->kasus_menonjol = $request->kasus_menonjol;
        $takah->pemeriksaan_tkp = $request->pemeriksaantkp;

        // update status takah
        $takah->statustakah_id = 3;
        $takah->siap_diserahkan_ke_urtu_at = Carbon::now();
        if ($request->kelengkapan_formil == 'lengkap' && $request->kelengkapan_teknis == 'lengkap') {
            $takah->takah_lengkap_at = Carbon::now();
        }

        // save data
        $takah->update();

        // response
        return $response = [
            'title' => 'Takah Dilanjutkan Ke Proses Selanjutnya.',
            'keteranganformiltambahan' => $keterangan_formil_tambahan,
            'keteranganteknistambahan' => $keterangan_teknis_tambahan,
        ];

    }

    public function tambahPemeriksa(Request $request, Takah $takah)
    {
        // validation rules
        $rules = [
            'pemeriksa1' => 'required',
        ];
        $this->validate($request, $rules);

        //attach many to many relationship
        $pemeriksa_array = [];
        ($request->pemeriksa1 !== null) ? array_push($pemeriksa_array, $request->pemeriksa1) : '';
        ($request->pemeriksa2 !== null) ? array_push($pemeriksa_array, $request->pemeriksa2) : '';
        ($request->pemeriksa3 !== null) ? array_push($pemeriksa_array, $request->pemeriksa3) : '';
        ($request->pemeriksa4 !== null) ? array_push($pemeriksa_array, $request->pemeriksa4) : '';
        $takah->pemeriksa()->syncWithoutDetaching($pemeriksa_array);

        // save data
        $takah->update();

        // response
        return $response = [
            'title' => 'Pemeriksa Berhasil Ditambahkan.'
        ];

    }

    public function simpanBap(Request $request, Takah $takah)
    {
        // upload BAP
        if ($request->file('bap')) {
            $filenameExt = $request->file('bap')->getClientOriginalExtension();
            $fileNameToStore = preg_replace("/\s+/", "", "bap") .
                '_' . time() . '.' . $filenameExt;
            $request->file('bap')->storeAs('public/bap', $fileNameToStore);

            // save BAP
            $bap = $takah->bap()->create([
                'link' => $fileNameToStore
            ]);
        }

        // durasi pemeriksaan
        $hari_ini = now();
        $takah_lengkap_at = $takah->takah_lengkap_at ?: $takah->siap_diserahkan_ke_urtu_at;
        $awal_pemeriksaan = Carbon::createFromFormat('Y-m-d H:s:i', $takah_lengkap_at);
        $jumlah_hari_pemeriksaan = $hari_ini->diffInDays($awal_pemeriksaan);
        $jumlah_hari_pemeriksaan = $jumlah_hari_pemeriksaan + 1;

        // update status takah
        $takah->statustakah_id = 4;
        $takah->tahap = 3;
        $takah->diserahkan_ke_urtu_at = Carbon::now();
        $takah->durasi_pemeriksaan = $jumlah_hari_pemeriksaan;

        // save data
        $takah->update();

        // response
        return $response = [
            'title' => 'Serahkan Takah Kembali Ke Urtu.'
        ];

    }

    public function tambahDokumenDiserahkan(Request $request, Takah $takah)
    {
        //bap laboratoris
        ($request->bap_laboratoris === "on") ? $bap_laboratoris = 1 : $bap_laboratoris = 0;

        // bb diserahkan
        ($request->bb_diserahkan === "on") ? $bb_diserahkan = 1 : $bb_diserahkan = 0;

        // save Dokumen Diserahkan
        $dokumenDiserahkan = $takah->dokumendiserahkan()->create([
            'bap_laboratoris' => $bap_laboratoris,
            'bb_diserahkan' => $bb_diserahkan
        ]);

        // update status takah
        $takah->statustakah_id = 5;
        $takah->siap_diserahkan_ke_penyidik_at = Carbon::now();

        // save data
        $takah->update();

        // response
        return $response = [
            'title' => 'Takah Siap Diserahkan Ke Penyidik.',
            'dokumenDiserahkan' => $dokumenDiserahkan
        ];

    }

    public function simpanPenyidikPenerima(Request $request, Takah $takah)
    {
        // validation rules
        if ($request->penyidik_id) {
            $rules = [];
        } else {
            $rules = [
                'nama' => 'required',
                'no_identitas' => 'required|unique:penyidik,no_identitas',
                'jenisidentitas_id' => 'required',
                'telepon' => 'required',
                'foto' => 'required',
                'digitalsign' => 'required',
            ];
        }
        $this->validate($request, $rules);

        // hanya simpan data penyidik bila data baru
        if (!$request->penyidik_id) {

            if ($request->file('foto')) {
                // upload foto
                $filenameExt = $request->file('foto')->getClientOriginalExtension();
                $fileNameToStore = preg_replace('/\s+/', '', strtolower($request->nama)) .
                    '_' . time() . '.' . $filenameExt;
                $request->file('foto')->storeAs('public', $fileNameToStore);
            } else {
                // upload foto
                $image = $request->foto;
                $image = str_replace('data:image/png;base64,', '', $image);
                $fileNameToStore = preg_replace('/\s+/', '', strtolower($request->nama)) . Str::random(10) . '.' . 'png';
                File::put(storage_path('app/public/') . $fileNameToStore, base64_decode($image));
            }

            // upload digitalsign
            $image = $request->digitalsign;
            $image = str_replace('data:image/png;base64,', '', $image);
            $imageName = preg_replace('/\s+/', '', strtolower($request->nama)) .
                Str::random(10) . '.' . 'png';
            File::put(storage_path('app/public/') . $imageName, base64_decode($image));

            // save penyidik
            $penyidik = Penyidik::create([
                "nama" => $request->nama,
                "no_identitas" => $request->no_identitas,
                "jenisidentitas_id" => $request->jenisidentitas_id,
                "pangkat_id" => $request->pangkat_id,
                "telepon" => $request->telepon,
                "foto" => $fileNameToStore,
                "digitalsign" => $imageName
            ]);
        } else {
            $penyidik = Penyidik::find($request->penyidik_id);
        }

        // update takah
        $takah->urtupenyerah_id = Auth::user()->id;
        $takah->penyidikpenerima_id = $penyidik->id;
        $takah->diserahkan_ke_penyidik_at = Carbon::now();

        // save data
        $takah->save();

        // response
        return $response = [
            'title' => 'Form Penyerahan Barang Bukti Berhasil Dibuat.',
            'text' => 'Lanjut Ke Proses Pemberian Feedback.',
            'penyidikPenerima' => $penyidik
        ];

    }

    public function simpanFeedBack(Request $request, Takah $takah)
    {
        $feedback = $takah->feedback()->create(
            [
                "pertanyaan1" => $request->pertanyaan1,
                "pertanyaan2" => $request->pertanyaan2,
                "pertanyaan3" => $request->pertanyaan3,
                "pertanyaan4" => $request->pertanyaan4,
                "pertanyaan5" => $request->pertanyaan5,
                "pertanyaan6" => $request->pertanyaan6,
            ]);

        // update status takah
        $takah->statustakah_id = 6;
        $takah->diserahkan_ke_penyidik_at = Carbon::now();

        // save data
        $takah->update();

        return $response = [
            "title" => "Proses Takah Selesai",
            "text" => "Proses takah selesai, lihat form penyerahan takah?",
            "feedback" => $feedback
        ];
    }
}
