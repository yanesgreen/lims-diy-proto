<?php

namespace App\Http\Controllers;

use App\BarangBukti;
use App\Bidang;
use App\Jenisbb;
use App\Takah;
use Illuminate\Http\Request;

class BarangBuktiController extends Controller
{

    public function index(Takah $takah)
    {
        return view('barangbukti.index', compact('takah'));
    }

    public function create(Takah $takah)
    {
        $bidang = Bidang::pluck('nama', 'id');
        $jenisbb = Jenisbb::all();

        return view('barangbukti.create', [
            'takah' => $takah,
            'jenisbb' => $jenisbb,
            'bidang' => $bidang,
        ]);
    }

    public function store(Request $request, $id)
    {
        $barangbukti = new BarangBukti();
        $takah = Takah::find($id);

        // validation
        $rules = [
            'jenisbb_id' => 'required',
            'jumlah' => 'required',
        ];
        $this->validate($request, $rules);

        // hitung jumlah barang bukti
        $jumlahBB = $takah->barangbukti()->count();

        if ($jumlahBB >= 4) {
            $response = ['message' => 'Gagal Disimpan. Barang bukti Maksimal 4'];
            return $response;
        }

        // insert user input ke db
        $barangbukti->jenisbb_id = $request->jenisbb_id;
        $barangbukti->foto = $takah->foto_bb;
        $barangbukti->jumlah = $request->jumlah;
        $barangbukti->berat = $request->berat;

        // store data
        $barangbukti->save();

        // attach barang bukti
        $takah->barangbukti()->attach($barangbukti->id);

        // response
        $response = ['message' => 'Barang bukti berhasil disimpan'];
        return $response;
    }

    public function edit(takah $takah, BarangBukti $barangbukti)
    {
        $bidang = Bidang::pluck('nama', 'id');
        $jenisbb = Jenisbb::all();
        return view('barangbukti.edit', [
            'takah' => $takah,
            'barangbukti' => $barangbukti,
            'jenisbb' => $jenisbb,
            'bidang' => $bidang,
        ]);
    }

    public function update(Request $request, Takah $takah, BarangBukti $barangbukti)
    {
        // validation rules
        $rules = [
            'jenisbb_id' => 'required',
            'jumlah' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        $barangbukti->jenisbb_id = $request->input('jenisbb_id');
        $barangbukti->jumlah = $request->input('jumlah');
        $barangbukti->berat = $request->input('berat');
        $barangbukti->update();

        //response
        $response = ['message' => 'Barang bukti berhasil diubah'];
        return $response;
    }

    public function delete($id)
    {
        $barangBukti = BarangBukti::find($id);
        return view('barangbukti.delete', ['barangbukti' => $barangBukti]);
    }

    public function softdelete($id)
    {

        $barangBukti = BarangBukti::find($id);
        $takah = $barangBukti->takah[0];

        // hitung jumlah barang bukti
        $jumlahBB = $takah->barangbukti()->count();

        if ($jumlahBB <= 1) {
            $response = ['message' => 'Gagal Dihapus. Barang bukti Minimal 1'];
            return $response;
        }

        // delete data
        $barangBukti->delete();

        //response
        $response = ['message' => 'Barang Bukti berhasil dihapus'];
        return $response;
    }
}
