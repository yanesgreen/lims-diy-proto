<?php

namespace App\Http\Controllers;

use App\Polda;
use Illuminate\Http\Request;

class PoldaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('polda.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('polda.create');
    }


    public function store(Request $request)
    {
        // validation rules
        $rules = [
            'nama' => 'required',
        ];

        // nomor urut
        $poldaTerakhir = Polda::latest()->first();
        $no_urut_terakhir = $poldaTerakhir->nomorurut;
        $no_urut = $no_urut_terakhir + 100;

        // validate $_POST
        $this->validate($request, $rules);

        // buat instance, ganti 'Nama' dengan nama model yg digunakan di controller ini
        $polda = new Polda();

        // insert user input ke db
        $polda->nama = $request->input('nama');
        $polda->alamat = $request->input('alamat');
        $polda->telepon = $request->input('telepon');
        $polda->nomorurut = $no_urut;

        // store data
        $polda->save();

        // response
        $response = ['message' => $request->input('nama') . ' berhasil disimpan'];
        return $response;
    }

    public function edit(Polda $polda)
    {
        return view('polda.edit', compact('polda'));
    }

    public function update(Request $request, Polda $polda)
    {
        // validation rules
        $rules = [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        // insert user input ke db
        $polda->nama = $request->input('nama');
        $polda->alamat = $request->input('alamat');
        $polda->telepon = $request->input('telepon');

        // save data
        $polda->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(Polda $polda)
    {
        return view('polda.delete', compact('polda'));
    }

    public function softdelete(Polda $polda)
    {
        // insert user input
        $polda->delete();

        //response
        $response = ['message' => 'polda berhasil dihapus'];
        return $response;
    }
}
