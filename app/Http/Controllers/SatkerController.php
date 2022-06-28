<?php

namespace App\Http\Controllers;

use App\Satker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SatkerController extends Controller
{

    public function index()
    {
        return view('satker.index');
    }

    public function create()
    {
        return view('satker.create');
    }

    public function store(Request $request)
    {
        $satker = new Satker();

        // validation rules
        $rules = [
            'nama' => 'required|unique:satker,nama',
        ];
        $this->validate($request, $rules);

        //save
        $satker->nama = $request->input('nama');
        $satker->save();

        // response
        $response = ['message' => $request->input('nama') . ' berhasil disimpan'];
        return $response;

    }

    public function edit(Satker $satker)
    {
        return view('satker.edit', compact('satker'));
    }

    public function update(Request $request, Satker $satker)
    {
        // validation rules
        $rules = [
            'nama' => ['required', Rule::unique('satker')->ignore($satker->id)],
        ];
        $this->validate($request, $rules);

        // insert user input
        $satker->nama = $request->input('nama');

        // save data
        $satker->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(Satker $satker)
    {
        return view('satker.delete', compact('satker'));
    }

    public function softdelete(Satker $satker)
    {
        // insert user input
        $satker->delete();

        //response
        $response = ['message' => 'Satker berhasil dihapus'];
        return $response;
    }
}
