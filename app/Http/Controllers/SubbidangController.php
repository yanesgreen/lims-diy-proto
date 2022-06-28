<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\Subbidang;
use Illuminate\Http\Request;

class SubbidangController extends Controller
{

    public function index(Bidang $bidang)
    {
        return view('subbidang.index', compact('bidang'));
    }

    public function create(Bidang $bidang)
    {
        return view('subbidang.create', compact('bidang'));
    }

    public function store(Request $request, Bidang $bidang)
    {
        $subbidang = new Subbidang();

        // validation
        $rules = [
            'nama' => 'required|min:3|max:30',
            'singkatan' => 'required|max:30',
        ];
        $this->validate($request, $rules);

        // insert user input ke db
        $subbidang->nama = $request->input('nama');
        $subbidang->singkatan = $request->input('singkatan');
        $subbidang->bidang_id = $bidang->id;

        // store data
        $subbidang->save();

        // response
        $response = ['message' => $request->input('nama') . ' berhasil disimpan'];
        return $response;
    }

    public function edit(Bidang $bidang, Subbidang $subbidang)
    {
        return view('subbidang.edit', ['bidang' => $bidang, 'subbidang' => $subbidang]);
    }

    public function update(Request $request, Bidang $bidang, Subbidang $subbidang)
    {
        // validation
        $rules = [
            'nama' => 'required|min:3|max:30',
            'singkatan' => 'required|max:30',
        ];
        $this->validate($request, $rules);

        $subbidang->nama = $request->input('nama');
        $subbidang->singkatan = $request->input('singkatan');
        $subbidang->update();

        //response
        $response = ['message' => $request->input('nama') . ' berhasil diubah'];
        return $response;
    }

    public function delete(Bidang $bidang, Subbidang $subbidang)
    {
        return view('subbidang.delete', ['bidang' => $bidang, 'subbidang' => $subbidang]);
    }

    public function softdelete(Bidang $bidang, Subbidang $subbidang)
    {
        // delete data
        $subbidang->delete();

        //response
        $response = ['message' => 'Subbidang berhasil dihapus'];
        return $response;
    }
}
