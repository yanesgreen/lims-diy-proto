<?php

namespace App\Http\Controllers;

use App\Bidang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BidangController extends Controller
{
    public function index()
    {
        return view('bidang.index');
    }

    public function create()
    {
        return view('bidang.create');
    }

    public function store(Request $request)
    {
        $bidang = new Bidang();

        // validation rules
        $rules = [
            'nama' => 'required|unique:bidang,nama',
            'singkatan' => 'required|unique:bidang,singkatan'
        ];
        $this->validate($request, $rules);

        //save
        $bidang->nama = $request->input('nama');
        $bidang->singkatan = $request->input('singkatan');
        $bidang->save();

        // response
        $response = ['message' => $request->input('nama') . ' berhasil disimpan'];
        return $response;

    }

    public function edit(Bidang $bidang)
    {
        return view('bidang.edit', compact('bidang'));
    }

    public function update(Request $request, Bidang $bidang)
    {
        // validation rules
        $rules = [
            'nama' => ['required', Rule::unique('bidang')->ignore($bidang->id)],
            'singkatan' => ['required', Rule::unique('bidang')->ignore($bidang->id)],
        ];
        $this->validate($request, $rules);

        // insert user input
        $bidang->nama = $request->input('nama');
        $bidang->singkatan = $request->input('singkatan');

        // save data
        $bidang->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(Bidang $bidang)
    {
        return view('bidang.delete', compact('bidang'));
    }

    public function softdelete(Bidang $bidang)
    {
        // insert user input
        $bidang->delete();

        //response
        $response = ['message' => 'Bidang berhasil dihapus'];
        return $response;
    }

}
