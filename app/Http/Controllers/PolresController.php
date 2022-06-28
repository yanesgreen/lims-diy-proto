<?php

namespace App\Http\Controllers;

use App\Polda;
use App\Polres;
use Illuminate\Http\Request;

class PolresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('polres.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polda = Polda::pluck('nama', 'id');
        return view('polres.create', ["polda" => $polda]);
    }

    public function store(Request $request)
    {
        // validation rules
        $rules = [
            'nama' => 'required',
            'polda_id' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        // buat instance, ganti 'Nama' dengan nama model yg digunakan di controller ini
        $polres = new Polres();

        // insert user input ke db
        $polres->nama = $request->input('nama');
        $polres->alamat = $request->input('alamat');
        $polres->telepon = $request->input('telepon');
        $polres->polda_id = $request->input('polda_id');
        // store data
        $polres->save();

        // response
        $response = ['message' => $request->input('nama') . ' berhasil disimpan'];
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Polres $Polres
     * @return \Illuminate\Http\Response
     */
    public function show(Polres $polres)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Polres $Polres
     * @return \Illuminate\Http\Response
     */
    public function edit(Polres $polres)
    {
        $polda = Polda::pluck('nama', 'id');
        return view('polres.edit', [
            "polres" => $polres,
            "polda" => $polda,
        ]);
    }

    public function update(Request $request, Polres $polres)
    {
        // validation rules
        $rules = [
            'nama' => 'required',
            'polda_id' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        // insert user input ke db
        $polres->nama = $request->input('nama');
        $polres->alamat = $request->input('alamat');
        $polres->telepon = $request->input('telepon');
        $polres->polda_id = $request->input('polda_id');


        // save data
        $polres->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(Polres $polres)
    {
        return view('polres.delete', compact('polres'));
    }

    public function softdelete(Polres $polres)
    {
        // insert user input
        $polres->delete();

        //response
        $response = ['message' => 'Polres berhasil dihapus'];
        return $response;
    }

}
