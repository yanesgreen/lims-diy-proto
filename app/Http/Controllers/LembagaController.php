<?php

namespace App\Http\Controllers;

use App\Lembaga;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class LembagaController extends Controller
{

    public function index()
    {
        return view('lembaga.index');
    }

    public function create()
    {
        return view('lembaga.create');
    }

    public function store(Request $request)
    {
        $lembaga = new Lembaga();

        // validation rules
        $rules = [
            'nama' => 'required|unique:lembaga,nama',
        ];
        $this->validate($request, $rules);

        //save
        $lembaga->nama = $request->input('nama');
        $lembaga->save();

        // response
        $response = ['message' => $request->input('nama') . ' berhasil disimpan'];
        return $response;

    }

    public function edit(Lembaga $lembaga)
    {
        return view('lembaga.edit', compact('lembaga'));
    }

    public function update(Request $request, Lembaga $lembaga)
    {
        // validation rules
        $rules = [
            'nama' => ['required', Rule::unique('lembaga')->ignore($lembaga->id)],
        ];
        $this->validate($request, $rules);

        // insert user input
        $lembaga->nama = $request->input('nama');

        // save data
        $lembaga->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(Lembaga $lembaga)
    {
        return view('lembaga.delete', compact('lembaga'));
    }

    public function softdelete(Lembaga $lembaga)
    {
        // insert user input
        $lembaga->delete();

        //response
        $response = ['message' => 'Lembaga berhasil dihapus'];
        return $response;
    }
}
