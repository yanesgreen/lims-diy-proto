<?php

namespace App\Http\Controllers;

use App\Pangkat;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('pangkat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('pangkat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $pangkat = new Pangkat();

        // validation
        $rules = [
            'nama' => 'required|unique:pangkat,nama',
            'singkatan' => 'required|unique:pangkat,singkatan'
        ];
        $this->validate($request, $rules);

        // insert user input ke db
        $pangkat->nama = $request->input('nama');
        $pangkat->singkatan = $request->input('singkatan');

        // store data
        $pangkat->save();

        // response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil disimpan'];
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param Pangkat $pangkat
     * @return Application|Factory|View
     */
    public function show(Pangkat $pangkat)
    {
        return view('pangkat.edit', compact('pangkat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pangkat $pangkat
     * @return Application|Factory|View
     */
    public function edit(Pangkat $pangkat)
    {
        return view('pangkat.edit', compact('pangkat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Pangkat $pangkat
     * @return string[]
     */
    public function update(Request $request, Pangkat $pangkat)
    {
        // validation
        $rules = [
            'nama' => ['required', Rule::unique('pangkat')->ignore($pangkat->id)],
            'singkatan' => ['required', Rule::unique('singkatan')->ignore($pangkat->id)],
        ];
        $this->validate($request, $rules);

        // user input
        $pangkat->nama = $request->input('nama');
        $pangkat->singkatan = $request->input('singkatan');

        // update data
        $pangkat->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pangkat $pangkat
     * @return Response
     */
    public function destroy(Pangkat $pangkat)
    {
        //
    }

    public function delete(Pangkat $pangkat)
    {
        return view('pangkat.delete', compact('pangkat'));
    }

    public function softdelete(Pangkat $pangkat)
    {

        // save data
        $pangkat->delete();

        //response
        $response = ['message' => 'Pangkat berhasil dihapus'];
        return $response;
    }
}
