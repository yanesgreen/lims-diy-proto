<?php

namespace App\Http\Controllers;

use App\Polres;
use App\Polsek;
use Illuminate\Http\Request;

class PolsekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('polsek.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polres = Polres::pluck('nama', 'id');
        return view('polsek.create', ["polres" => $polres]);
    }

    public function store(Request $request)
    {
        // validation rules
        $rules = [
            'nama' => 'required',
            'polres_id' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        // buat instance, ganti 'Nama' dengan nama model yg digunakan di controller ini
        $polsek = new Polsek();

        // insert user input ke db
        $polsek->nama = $request->input('nama');
        $polsek->alamat = $request->input('alamat');
        $polsek->telepon = $request->input('telepon');
        $polsek->polres_id = $request->input('polres_id');
        // store data
        $polsek->save();

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
    public function show(Polsek $polsek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Polres $Polres
     * @return \Illuminate\Http\Response
     */
    public function edit(Polsek $polsek)
    {
        $polres = Polres::pluck('nama', 'id');
        return view('polsek.edit', [
            "polsek" => $polsek,
            "polres" => $polres,
        ]);
    }

    public function update(Request $request, Polsek $polsek)
    {
        // validation rules
        $rules = [
            'nama' => 'required',
            'polres_id' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        // insert user input ke db
        $polsek->nama = $request->input('nama');
        $polsek->alamat = $request->input('alamat');
        $polsek->telepon = $request->input('telepon');
        $polsek->polres_id = $request->input('polres_id');


        // save data
        $polsek->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(Polsek $polsek)
    {
        return view('polsek.delete', compact('polsek'));
    }

    public function softdelete(Polsek $polsek)
    {
        // insert user input
        $polsek->delete();

        //response
        $response = ['message' => 'Polsek berhasil dihapus'];
        return $response;
    }
}
