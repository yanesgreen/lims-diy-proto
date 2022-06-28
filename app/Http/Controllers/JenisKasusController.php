<?php

namespace App\Http\Controllers;

use App\JenisKasus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JenisKasusController extends Controller
{
    public function index()
    {
        return view('jeniskasus.index');
    }

    public function create()
    {
        return view('jeniskasus.create');
    }

    public function store(Request $request)
    {
        $jeniskasus = new JenisKasus();

        // validation rules
        $rules = [
            'nama' => 'required|unique:jeniskasus,nama',
        ];
        $this->validate($request, $rules);

        //save
        $jeniskasus->nama = $request->input('nama');
        $jeniskasus->save();

        // response
        $response = ['message' => $request->input('nama') . ' berhasil disimpan'];
        return $response;

    }

    public function edit(JenisKasus $jeniskasus)
    {
        return view('jeniskasus.edit', compact('jeniskasus'));
    }

    public function update(Request $request, JenisKasus $jeniskasus)
    {
        // validation rules
        $rules = [
            'nama' => ['required', Rule::unique('jeniskasus')->ignore($jeniskasus->id)],
        ];
        $this->validate($request, $rules);

        // insert user input
        $jeniskasus->nama = $request->input('nama');

        // save data
        $jeniskasus->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(JenisKasus $jeniskasus)
    {
        return view('jeniskasus.delete', compact('jeniskasus'));
    }

    public function softdelete(JenisKasus $jeniskasus)
    {
        // insert user input
        $jeniskasus->delete();

        //response
        $response = ['message' => 'Jenis Kasus berhasil dihapus'];
        return $response;
    }
}
