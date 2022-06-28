<?php

namespace App\Http\Controllers;

use App\AsalTakah;
use App\BarangBukti;
use App\Bidang;
use App\Counter;
use App\DetailPermintaan;
use App\Jenisbb;
use App\JenisIdentitas;
use App\JenisKasus;
use App\KeteranganFormilTambahan;
use App\KeteranganTeknisTambahan;
use App\Lembaga;
use App\Mindik;
use App\Pangkat;
use App\Pemeriksa;
use App\Penyidik;
use App\Polda;
use App\Polres;
use App\Polsek;
use App\Satker;
use App\Subbidang;
use App\Takah;
use App\UnitKerja;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TakahController extends Controller
{
    /**
     * @param $request
     * @param array $rules
     * @return array
     */
    private function instansi_rules($request, array $rules): array
    {
        if ($request->instansi === 'polri') {
            $rules['mabes_nonmabes'] = 'required';

            if ($request->mabes_nonmabes === 'mabes') {
                $rules['satker_id'] = 'required';
            }

            if ($request->mabes_nonmabes === 'non-mabes') {
                $rules['polda'] = 'required';
            }
        }

        if ($request->instansi === 'nonpolri') {
            $rules['lembaga_id'] = 'required';
        }

        return $rules;
    }

    private function penyidikTerdaftarValidationRules($request)
    {
        $rules = [
            'tgl_penerimaan' => 'required',
            'tgl_surat' => 'required',
            'no_surat' => 'required',
            'instansi' => 'required',
        ];

        return $this->instansi_rules($request, $rules);
    }

    private function penyidikBaruValidationRules($request)
    {
        $rules = [
            'tgl_penerimaan' => 'required',
            'nama' => 'required',
            'no_identitas' => 'required|unique:penyidik,no_identitas',
            'jenisidentitas_id' => 'required',
            'telepon' => 'required',
            'foto' => 'required',
            'digitalsign' => 'required',
            'tgl_surat' => 'required',
            'no_surat' => 'required',
            'instansi' => 'required',
        ];

        if ($request->jenisidentitas_id === 3) {
            $rules['pangkat_id'] = 'required';
        }

        return $this->instansi_rules($request, $rules);
    }

    //================
    // index
    //================
    public function indexIzin()
    {
        return view('takah.index.izin');
    }

    public function indexSummary()
    {
        return view('takah.index.summary');
    }

    public function indexEdit()
    {
        return view('takah.index.edit');
    }

    public function indexTahap(Request $request)
    {
        // tampilkan ke view
        return view('takah.index.tahap', ["tahap" => $request->tahap,]);
    }

    public function indexTakahTelahSelesai()
    {
        $data = [
            'year' => date("Y")
        ];

        return view('takah.index.takah_telah_selesai', compact('data'));
    }

    //================
    // Detail/Show
    //================
    public function detail($id)
    {
        $takah = Takah::find($id);
        return view('takah.detail.default', ['takah' => $takah]);
    }

    //================
    // create
    //================
    public function penerimaan()
    {
        // no takah takah terakhir
        $tahun_ini = now()->year;
        $data_tahun_ini = Takah::whereYear('created_at', $tahun_ini)->count();

        // counter unit kerja
        $counter_unitkerja = Counter::where('unitkerja_id', unitKerjaId())->first();

        // no takah
        if ($data_tahun_ini == 0) {
            $counter = 1;
        } else {
            $counter = $counter_unitkerja->number + 1;
        }
        $no_takah = str_pad($counter, 6, 0, STR_PAD_LEFT);

        // data untuk select
        $jenisidentitas = JenisIdentitas::pluck('nama', 'id');
        $pangkat = Pangkat::pluck('nama', 'id');
        $jenisbb = Jenisbb::all();
        $bidang = Bidang::pluck('nama', 'id');
        $jeniskasus = JenisKasus::pluck('nama', 'id');
        $satker = Satker::pluck('nama', 'id');
        $lembaga = Lembaga::pluck('nama', 'id');
        $polda = Polda::orderBy('nomorurut', 'asc')->pluck('nama', 'id');
        $polres = Polres::pluck('nama', 'id')->prepend('Tidak Ada', 'none');

        return view('takah.penerimaan.default', [
            "jenisidentitas" => $jenisidentitas,
            "pangkat" => $pangkat,
            "jenisbb" => $jenisbb,
            "bidang" => $bidang,
            "jeniskasus" => $jeniskasus,
            "satker" => $satker,
            "lembaga" => $lembaga,
            "polda" => $polda,
            "polres" => $polres,
            "no_takah" => $no_takah
        ]);
    }

    //================
    // store
    //================
    public function store(Request $request)
    {
        $rules = [
            "no_takah" => "required",
            "bidang_id" => "required",
            "subbidang_kode" => "required",
            "penyidik_id" => "required",
            "detailpermintaan_id" => "required",
            "asaltakah_id" => "required",
            "barangbukti_id" => "required",
            "jeniskasus_id" => "required",
            "mindik_id" => "required",
        ];
        $this->validate($request, $rules);

        // subbidang id
        $subbidang = Subbidang::where('kode', $request->subbidang_kode)->firstOrFail();

        // no takah takah terakhir
        $tahun_ini = now()->year;
        $data_tahun_ini = Takah::whereYear('created_at', $tahun_ini)
            ->where('unitkerja_id', unitKerjaId())
            ->count();

        // counter unit kerja
        $counter_unitkerja = Counter::where('unitkerja_id', unitKerjaId())->first();

        // no takah
        if ($data_tahun_ini == 0) {
            $counter = 1;
        } else {
            $counter = $counter_unitkerja->number + 1;
        }
        $no_takah = str_pad($counter, 6, 0, STR_PAD_LEFT);

        // no takah
        $nomor = $no_takah . '/' . $request->subbidang_kode . '/' . Carbon::now()->year . '/' . UnitKerja::find(unitKerjaId())->singkatan;

        // semester
        $semester1 = [1, 2, 3, 4, 5, 6];
        if (in_array(Carbon::now()->month, $semester1)) {
            $semester = 1;
        } else {
            $semester = 2;
        }

        //save takah
        $takah = Takah::create([
            "nomor" => $nomor,
            'foto_bb' => $request->foto_barangbukti,
            "penyidik_id" => $request->penyidik_id,
            "detailpermintaan_id" => $request->detailpermintaan_id,
            "unitkerja_id" => unitKerjaId(),
            "asaltakah_id" => $request->asaltakah_id,
            "urtu_id" => Auth::user()->id,
            "jeniskasus_id" => $request->jeniskasus_id,
            "mindik_id" => $request->mindik_id,
            "bidang_id" => $request->bidang_id,
            "subbidang_id" => $subbidang->id,
            "editable" => 0,
            "tahap" => 1,
            "statustakah_id" => 1,
            "kasus_menonjol" => 0,
            "created_at" => $request->created_at,
            "created_at_semester" => $semester,
            "dibuka_oleh" => $request->dibuka_oleh_v2
        ]);

        // Update Counter
        $counter_unitkerja->number = $counter;
        $counter_unitkerja->update();

        // barangbukti
        $barangbuktiArray = json_decode('[' . $request->barangbukti_id . ']', true);
        $takah->barangbukti()->syncWithoutDetaching($barangbuktiArray);

        // tersangka
        $tersangka_array = [];
        ($request->suspect1 !== null) ? array_push($tersangka_array, ['nama' => $request->suspect1]) : '';
        ($request->suspect2 !== null) ? array_push($tersangka_array, ['nama' => $request->suspect2]) : '';
        ($request->suspect3 !== null) ? array_push($tersangka_array, ['nama' => $request->suspect3]) : '';
        $takah->tersangka()->createMany($tersangka_array);

        // saksi
        $saksi_array = [];
        ($request->witness1 !== null) ? array_push($saksi_array, ['nama' => $request->witness1]) : '';
        ($request->witness2 !== null) ? array_push($saksi_array, ['nama' => $request->witness2]) : '';
        ($request->witness3 !== null) ? array_push($saksi_array, ['nama' => $request->witness3]) : '';
        $takah->saksi()->createMany($saksi_array);

        // mindik tambahan
        $mindiktambahan_array = [];
        ($request->mt1 !== null) ? array_push($mindiktambahan_array, ['nama' => $request->mt1]) : '';
        ($request->mt2 !== null) ? array_push($mindiktambahan_array, ['nama' => $request->mt2]) : '';
        ($request->mt3 !== null) ? array_push($mindiktambahan_array, ['nama' => $request->mt3]) : '';
        $takah->mindiktambahan()->createMany($mindiktambahan_array);

        $response = [
            'title' => 'Takah Berhasil Disimpan',
            'text' => 'Lihat Dokumen Cetak Penerimaan Barang Bukti',
            'url_cetakan_penerimaan' => route('takah.cetakan.penerimaan', ["takah" => $takah->id])
        ];
        return $response;
    }

    public function storePenyidik_Permintaan_Asal(Request $request)
    {
        $rules = [];

        // validation rules (data penyidik tersedia di db)
        if ($request->penyidik_id) {
            $rules = $this->penyidikTerdaftarValidationRules($request);
            $this->validate($request, $rules);
        }

        // validation rules (data penyidik baru + polisi)
        if (!$request->penyidik_id && ($request->jenisidentitas_id === 3)) {
            $rules = $this->penyidikBaruValidationRules($request);
            $this->validate($request, $rules);
        }

        // validation rules (data penyidik baru + non polisi)
        if (!$request->penyidik_id && ($request->jenisidentitas_id !== 3)) {
            $rules = $this->penyidikBaruValidationRules($request);
            $this->validate($request, $rules);
        }

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
                $fileNameToStore = preg_replace('/\s+/', '', strtolower($request->nama)) .
                    Str::random(10) . '.' . 'png';
                File::put(storage_path('app/public/') . $fileNameToStore, base64_decode($image));
            }

            // upload digitalsign
            $image = $request->digitalsign;
            $image = str_replace('data:image/png;base64,', '', $image);
            $imageName = preg_replace('/\s+/', '', strtolower($request->nama)) .
                Str::random(10) . '.' . 'png';
            File::put(storage_path('app/public/') . $imageName, base64_decode($image));

            // save penyidik
            $penyidik = Penyidik::updateOrCreate([
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

        // save detail permintaan
        $detailPermintaan = DetailPermintaan::updateOrCreate([
            "tgl_surat" => $request->tgl_surat,
            "no_surat" => $request->no_surat,
        ]);

        // nama asal
        if ($request->satker_id != null) {
            $nama_asal = Satker::find($request->satker_id)->nama;
        } elseif ($request->polda != null) {
            $nama_asal = Polda::find($request->polda)->nama;
        } elseif ($request->lembaga_id != null) {
            $nama_asal = Lembaga::find($request->lembaga_id)->nama;
        }

        // save asal takah
        $asalTakah = AsalTakah::updateOrCreate([
            "instansi" => $request->instansi,
            "satker_id" => $request->satker_id,
            "polda_id" => $request->polda,
            "polres_id" => $request->polres,
            "polsek_id" => $request->polsek,
            "lembaga_id" => $request->lembaga_id,
            "nama_asal" => $nama_asal,
            "keterangan_ppns" => $request->keterangan_ppns
        ]);

        // response
        $response = [
            'title' => 'Data Berhasil Disimpan',
            'text' => 'Lanjut ke proses selanjutnya',
            'penyidik_id' => $penyidik->id,
            'detailpermintaan_id' => $detailPermintaan->id,
            'asaltakah_id' => $asalTakah->id,
        ];
        return $response;
    }

    public function storeJenisKasus_BarangBukti_Mindik(Request $request)
    {
        function array_push_assoc($array, $key, $value)
        {
            $array[$key] = $value;
            return $array;
        }

        $rules = [
            'jeniskasus' => 'required',
            'foto_bb' => 'required',
            'jenisbb1_id' => 'required',
            'jumlahbb1' => 'required',
        ];

        if ($request->jenisbb2_id) {
            $rules = array_push_assoc($rules, 'jumlahbb2', 'required');
        }
        if ($request->jenisbb3_id) {
            $rules = array_push_assoc($rules, 'jumlahbb3', 'required');
        }
        if ($request->jenisbb4_id) {
            $rules = array_push_assoc($rules, 'jumlahbb4', 'required');
        }
        $this->validate($request, $rules);

        // upload foto BB
        if ($request->file('foto_bb')) {
            $filenameExt = $request->file('foto_bb')->getClientOriginalExtension();
            $fileNameToStore = preg_replace('/\s+/', '', strtolower($request->deskripsi)) .
                '_' . time() . '.' . $filenameExt;
            $request->file('foto_bb')->storeAs('public', $fileNameToStore);
        } else {
            $image = $request->foto_bb;
            $image = str_replace('data:image/png;base64,', '', $image);
            $fileNameToStore = preg_replace('/\s+/', '', strtolower($request->nama)) . Str::random(10) . '.' . 'png';
            File::put(storage_path('app/public/') . $fileNameToStore, base64_decode($image));
        }

        // array barang bukti
        $barangBuktiArray = [];

        // save barang bukti 1
        if ($request->jenisbb1_id) {
            $barangBukti1 = BarangBukti::create([
                'deskripsi' => $request->deskripsi,
                'jenisbb_id' => $request->jenisbb1_id,
                'dibuka_oleh' => $request->dibuka_oleh,
                'jumlah' => $request->jumlahbb1,
                'berat' => $request->beratbb1,
                "foto" => $fileNameToStore,
            ]);
            array_push($barangBuktiArray, $barangBukti1->id);
        }

        // save barang bukti 2
        if ($request->jenisbb2_id) {
            $barangBukti2 = BarangBukti::create([
                'deskripsi' => $request->deskripsi,
                'jenisbb_id' => $request->jenisbb2_id,
                'dibuka_oleh' => $request->dibuka_oleh,
                'jumlah' => $request->jumlahbb2,
                'berat' => $request->beratbb2,
                "foto" => $fileNameToStore,
            ]);
            array_push($barangBuktiArray, $barangBukti2->id);
        }

        // save barang bukti 3
        if ($request->jenisbb3_id) {
            $barangBukti3 = BarangBukti::create([
                'deskripsi' => $request->deskripsi,
                'jenisbb_id' => $request->jenisbb3_id,
                'dibuka_oleh' => $request->dibuka_oleh,
                'jumlah' => $request->jumlahbb3,
                'berat' => $request->beratbb3,
                "foto" => $fileNameToStore,
            ]);
            array_push($barangBuktiArray, $barangBukti3->id);
        }

        // save barang bukti 4
        if ($request->jenisbb4_id) {
            $barangBukti4 = BarangBukti::create([
                'deskripsi' => $request->deskripsi,
                'jenisbb_id' => $request->jenisbb4_id,
                'dibuka_oleh' => $request->dibuka_oleh,
                'jumlah' => $request->jumlahbb4,
                'berat' => $request->beratbb4,
                "foto" => $fileNameToStore,
            ]);
            array_push($barangBuktiArray, $barangBukti4->id);
        }

        //save mindik
        $mindik = Mindik::updateOrCreate([
            'laporan_polisi' => $request->laporan_polisi === 'on' ? 1 : 0,
            'surat_permohonan' => $request->surat_permohonan === 'on' ? 1 : 0,
            'sprin_penggeledahan' => $request->sprin_penggeledahan === 'on' ? 1 : 0,
            'bap_penggeledahan' => $request->bap_penggeledahan === 'on' ? 1 : 0,
            'sprin_penyitaan' => $request->sprin_penyitaan === 'on' ? 1 : 0,
            "bap_penyitaan" => $request->bap_penyitaan === 'on' ? 1 : 0,
            "bap_saksi" => $request->bap_saksi === 'on' ? 1 : 0,
            "bap_tersangka" => $request->bap_tersangka === 'on' ? 1 : 0,
            "laporan_kemajuan" => $request->laporan_kemajuan === 'on' ? 1 : 0,
        ]);

        // response
        $response = [
            'title' => 'Data Berhasil Disimpan',
            'text' => 'Lanjut ke proses selanjutnya',
            'jeniskasus_id' => $request->jeniskasus,
            'barangbukti' => $barangBuktiArray,
            'suspect1' => $request->tersangka1,
            'suspect2' => $request->tersangka2,
            'suspect3' => $request->tersangka3,
            'witness1' => $request->saksi1,
            'witness2' => $request->saksi2,
            'witness3' => $request->saksi3,
            'mindik_id' => $mindik->id,
            'mindiktambahan1' => $request->mindiktambahan1,
            'mindiktambahan2' => $request->mindiktambahan2,
            'mindiktambahan3' => $request->mindiktambahan3,
            'foto_barangbukti' => $fileNameToStore,
            'dibuka_oleh' => $request->dibuka_oleh,
        ];
        return $response;
    }

    //================
    //  Edit
    //================
    public function edit(Takah $takah)
    {
        // no takah takah terakhir
        $tahun_ini = Carbon::now()->year;
        $data_tahun_ini = Takah::whereYear('created_at', $tahun_ini)->count();

        // no takah
        if ($data_tahun_ini == 0) {
            $counter = 1;
        } else {
            $counter = $data_tahun_ini == 0 ? 1 : ($data_tahun_ini + 1);
        }
        $no_takah = str_pad($counter, 6, 0, STR_PAD_LEFT);

        // data untuk select
        $jenisidentitas = JenisIdentitas::pluck('nama', 'id');
        $pangkat = Pangkat::pluck('nama', 'id');
        $bidang = Bidang::pluck('nama', 'id');
        $jeniskasus = JenisKasus::pluck('nama', 'id');
        $satker = Satker::pluck('nama', 'id');
        $lembaga = Lembaga::pluck('nama', 'id');
        $polda = Polda::orderBy('nomorurut', 'asc')->pluck('nama', 'id');
        $polres = Polres::pluck('nama', 'id');
        $polsek = Polsek::pluck('nama', 'id');
        $pemeriksa = Pemeriksa::where('bidang_id', $takah->bidang_id)
            ->pluck('nama', 'id')
            ->prepend('Tidak Ada', '');

        return view('takah.edit.default', [
            "jenisidentitas" => $jenisidentitas,
            "pangkat" => $pangkat,
            "bidang" => $bidang,
            "jeniskasus" => $jeniskasus,
            "satker" => $satker,
            "lembaga" => $lembaga,
            "polda" => $polda,
            "polres" => $polres,
            "polsek" => $polsek,
            "no_takah" => $no_takah,
            "pemeriksa" => $pemeriksa,
            "takah" => $takah
        ]);
    }

    public function editIzin(Takah $takah)
    {
        return view('takah.edit.izin', compact('takah'));
    }

    //================
    //  Update
    //================
    public function updatePenyidik_Permintaan_Asal(Request $request, Takah $takah)
    {
        if ($request->jenisidentitas_id == 3) {
            // validation rules
            $rules = [
                'jenisidentitas_id' => 'required',
                'no_identitas' => 'required',
                'pangkat_id' => 'required',
                'nama' => 'required',
                'telepon' => 'required',
                'tgl_surat' => 'required',
                'no_surat' => 'required',
            ];
        } else {
            // validation rules
            $rules = [
                'jenisidentitas_id' => 'required',
                'no_identitas' => 'required',
                'nama' => 'required',
                'telepon' => 'required',
                'tgl_surat' => 'required',
                'no_surat' => 'required',
            ];
        }


        // validate $_POST
        $this->validate($request, $rules);

        // penyidik
        $penyidik = Penyidik::find($request->penyidik_id);
        $penyidik->jenisidentitas_id = $request->jenisidentitas_id;
        $penyidik->no_identitas = $request->no_identitas;
        $penyidik->pangkat_id = $request->pangkat_id;
        $penyidik->nama = $request->nama;
        $penyidik->telepon = $request->telepon;
        $penyidik->save();

        // detail permintaan
        $detailPermintaan = DetailPermintaan::find($request->detailpermintaan_id);
        $detailPermintaan->tgl_surat = $request->tgl_surat;
        $detailPermintaan->no_surat = $request->no_surat;
        $detailPermintaan->save();

        // asal takah
        $asalTakah = AsalTakah::find($request->asaltakah_id);
        if ($request->instansi) {
            $asalTakah->instansi = $request->instansi;
        }

        if ($request->satker_id) {
            $asalTakah->satker_id = $request->satker_id;
        }

        if ($request->polda) {
            $asalTakah->polda_id = $request->polda;
        }

        if ($request->polres) {
            $asalTakah->polres_id = $request->polres;
        } elseif ($request->polres === 0) {
            $asalTakah->polres_id = null;
        } else {
            $asalTakah->polres_id = $request->polres;
        }

        if ($request->polsek) {
            $asalTakah->polsek_id = $request->polsek;
        } elseif ($request->polsek === 0) {
            $asalTakah->polsek_id = null;
        } else {
            $asalTakah->polsek_id = $request->polsek;
        }

        if ($request->lembaga_id) {
            $asalTakah->lembaga_id = $request->lembaga_id;
        }
        $asalTakah->save();

        //response
        $response = ['title' => 'Data Berhasil Di Update', 'text' => 'Selamat, data takah berhasil di update.'];
        return $response;
    }

    public function updateJenisKasus_BarangBukti_Mindik(Takah $takah, Request $request)
    {
        // validation rules
        $rules = [
            'jeniskasus_id' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        // update jenis kasus
        $takah->jeniskasus_id = $request->jeniskasus_id;
        $takah->save();

        // update tersangka
        foreach ($takah->tersangka as $index => $tersangka) {
            $takah->tersangka[$index]->nama = $request->input('tersangka' . ($index));
        };
        $takah->push();

        // update saksi
        foreach ($takah->saksi as $index => $saksi) {
            $takah->saksi[$index]->nama = $request->input('saksi' . ($index));
        };
        $takah->push();

        // update mindik tambahan
        foreach ($takah->mindiktambahan as $index => $mindiktambahan) {
            $takah->mindiktambahan[$index]->nama = $request->input('mindiktambahan' . $index);
        };
        $takah->push();

        // update mindik
        $mindik = Mindik::find($request->mindik_id);
        $mindik->laporan_polisi = $request->laporan_polisi === 'on' ? 1 : 0;
        $mindik->surat_permohonan = $request->surat_permohonan === 'on' ? 1 : 0;
        $mindik->sprin_penggeledahan = $request->sprin_penggeledahan === 'on' ? 1 : 0;
        $mindik->bap_penggeledahan = $request->bap_penggeledahan === 'on' ? 1 : 0;
        $mindik->sprin_penyitaan = $request->sprin_penyitaan === 'on' ? 1 : 0;
        $mindik->bap_penyitaan = $request->bap_penyitaan === 'on' ? 1 : 0;
        $mindik->bap_saksi = $request->bap_saksi === 'on' ? 1 : 0;
        $mindik->bap_tersangka = $request->bap_tersangka === 'on' ? 1 : 0;
        $mindik->laporan_kemajuan = $request->laporan_kemajuan === 'on' ? 1 : 0;
        $mindik->save();

        //response
        $response = [
            'title' => 'Data Berhasil Di Update',
            'text' => 'Selamat, data takah berhasil di update.',
            'foto' => $request->foto_bb
        ];
        return $response;
    }

    public function updateKeteranganFormilTambahan(Takah $takah)
    {
        $keteranganformiltambahan = KeteranganFormilTambahan::where('takah_id', $takah->id)->first();
        $keteranganformiltambahan->takah_id = 0;
        $keteranganformiltambahan->save();

        // update takah -> takah_lengkap_at
        if ($takah->keteranganteknistambahan && !$takah->keteranganformiltambahan) {
            $takah->takah_lengkap_at = Carbon::now();
            $takah->update();
        }

        return redirect()->to(url()->previous() . '#keterangan-container');
    }

    public function updateKeteranganTeknisTambahan(Takah $takah)
    {
        $keteranganteknistambahan = KeteranganTeknisTambahan::where('takah_id', $takah->id)->first();
        $keteranganteknistambahan->takah_id = 0;
        $keteranganteknistambahan->save();

        // update takah -> takah_lengkap_at
        if ($takah->keteranganteknistambahan && !$takah->keteranganformiltambahan) {
            $takah->takah_lengkap_at = Carbon::now();
            $takah->update();
        }

        return redirect()->to(url()->previous() . '#keterangan-container');
    }

    public function updateIzin(Request $request, Takah $takah)
    {
        if ($takah->editable == 0) {
            // validation rules
            $rules = [
                'editor_id' => 'required',
            ];

            // validate $_PUT
            $this->validate($request, $rules);
        }

        $takah->editable == 0 ? $editable = 1 : $editable = 0;
        $takah->editor_id == null ? $editor_id = $request->input('editor_id') : $editor_id = null;

        // insert user input
        $takah->editable = $editable;
        $takah->editor_id = $editor_id;

        // save data
        $takah->update();

        //response
        if ($editable == 1) {
            $response = ['message' => 'Takah ' . $takah->nomor . ' dapat diedit oleh ' . $request->input('editor_id')];
        } else {
            $response = ['message' => 'Izin Edit Takah Berhasil Dicabut'];
        }

        return $response;
    }

    public function updateKeteranganTakah(Request $request, Takah $takah)
    {
        // validation rules
        $rules = [
            'kasus_menonjol' => 'required',
            'pemeriksaantkp' => 'required',
        ];
        $this->validate($request, $rules);

        // update
        $takah->kasus_menonjol = $request->kasus_menonjol;
        $takah->pemeriksaan_tkp = $request->pemeriksaantkp;
        $takah->save();

        //response
        $response = [
            'title' => 'Data Berhasil Di Update',
            'text' => 'Selamat, data takah berhasil di update.',
        ];
        return $response;
    }

    public function updatePemeriksa(Request $request, Takah $takah)
    {

        // validation rules
        $rules = [
            'pemeriksa1' => 'required',
        ];
        $this->validate($request, $rules);

        $arrayPemeriksa = [];
        $request->pemeriksa1 ? array_push($arrayPemeriksa, $request->pemeriksa1) : '';
        $request->pemeriksa2 ? array_push($arrayPemeriksa, $request->pemeriksa2) : '';
        $request->pemeriksa3 ? array_push($arrayPemeriksa, $request->pemeriksa3) : '';
        $request->pemeriksa4 ? array_push($arrayPemeriksa, $request->pemeriksa4) : '';

        // update
        $takah->pemeriksa()->sync($arrayPemeriksa);
        $takah->update();

        //response
        $response = [
            'title' => 'Data Berhasil Di Update',
            'text' => 'Selamat, data takah berhasil di update.',
        ];
        return $response;
    }

    //================
    //  Tahap
    //================
    public function tahap($id)
    {
        $takah = Takah::find($id);
        $pemeriksa = Pemeriksa::where('bidang_id', $takah->bidang_id)->pluck('nama', 'id');
        $jenisidentitas = JenisIdentitas::pluck('nama', 'id');
        $pangkat = Pangkat::pluck('nama', 'id');

        return view('takah.tahap.default', [
            "takah" => $takah,
            "pemeriksa" => $pemeriksa,
            "jenisidentitas" => $jenisidentitas,
            "pangkat" => $pangkat,
        ]);
    }
}
