<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JabatanController extends Controller
{

    public function __construct()
    {
        $this->middleware(['checkrole:admin']);
    }

    public function index()
    {
        return view('jabatan.index');
    }


    public function create()
    {
        return view('jabatan.create');
    }


    public function store(Request $request)
    {
        $jabatan = new Jabatan();

        // validation
        $rules = [
            'nama' => 'required|unique:jabatan,nama'
        ];
        $this->validate($request, $rules);

        // insert user input ke db
        $jabatan->nama = $request->input('nama');

        // store data
        $jabatan->save();

        // response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil disimpan'];
        return $response;
    }


    public function edit(Jabatan $jabatan)
    {
        return view('jabatan.edit', compact('jabatan'));
    }


    public function update(Request $request, Jabatan $jabatan)
    {
        // validation
        $rules = [
            'nama' => ['required', Rule::unique('jabatan')->ignore($jabatan->id)],
        ];
        $this->validate($request, $rules);

        // user input
        $jabatan->nama = ucwords($request->input('nama'));

        // update data
        $jabatan->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(Jabatan $jabatan)
    {
        return view('jabatan.delete', compact('jabatan'));
    }

    public function softdelete(Jabatan $jabatan)
    {
        // delete
        $jabatan->delete();

        //response
        $response = ['message' => 'Jabatan berhasil dihapus'];
        return $response;
    }

}
