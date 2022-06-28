<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\Jenisbb;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class JenisbbController extends Controller
{

    public function __construct()
    {
        $this->middleware(['checkrole:admin']);
    }

    public function index()
    {
        return view('jenisbb.index');
    }

    public function create()
    {
        $bidang = Bidang::pluck('nama', 'id');
        return view('jenisbb.create', ["bidang" => $bidang]);
    }

    public function store(Request $request)
    {
        $jenisbb = new Jenisbb();

        // validation
        $rules = [
            'nama' => 'required|unique:jabatan,nama',
            'bidang_id' => 'required',
        ];
        $this->validate($request, $rules);

        // insert user input ke db
        $jenisbb->nama = $request->input('nama');
        $jenisbb->bidang_id = $request->input('bidang_id');
        $jenisbb->keterangan = $request->input('keterangan');

        // store data
        $jenisbb->save();

        // response
        $response = ['message' => $request->input('nama') . ' berhasil disimpan'];
        return $response;

    }

    public function edit(Jenisbb $jenisbb)
    {
        return view('jenisbb.edit', compact('jenisbb'));
    }

    public function update(Request $request, Jenisbb $jenisbb)
    {
        // validation
        $rules = [
            'nama' => ['required', Rule::unique('jenisbb')->ignore($jenisbb->id)],
        ];
        $this->validate($request, $rules);

        // user input
        $jenisbb->nama = $request->input('nama');
        $jenisbb->keterangan = $request->input('keterangan');

        // update data
        $jenisbb->update();

        // response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(Jenisbb $jenisbb)
    {
        return view('jenisbb.delete', compact('jenisbb'));
    }

    public function softdelete(Jenisbb $jenisbb)
    {

        // delete data
        $jenisbb->delete();

        //response
        $response = ['message' => 'Jenis Barang Bukti berhasil dihapus'];
        return $response;
    }
}
