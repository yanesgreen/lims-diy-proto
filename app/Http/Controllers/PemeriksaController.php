<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\Pangkat;
use App\Pemeriksa;
use App\UnitKerja;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PemeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('pemeriksa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $bidang = Bidang::pluck('nama', 'id');
        $pangkat = Pangkat::pluck('nama', 'id');
        $unitkerja = UnitKerja::pluck('nama', 'id');
        return view('pemeriksa.create', ["bidang" => $bidang, "pangkat" => $pangkat, "unitkerja" => $unitkerja]);
    }

    public function store(Request $request)
    {
        // validation rules
        $rules = [
            'nama' => 'required',
            'nrp' => 'required',
            'bidang_id' => 'required',
            'pangkat_id' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        // buat instance, ganti 'Nama' dengan nama model yg digunakan di controller ini
        $pemeriksa = new Pemeriksa();

        // insert user input ke db
        $pemeriksa->nama = $request->input('nama');
        $pemeriksa->nrp = $request->input('nrp');
        $pemeriksa->bidang_id = $request->input('bidang_id');
        $pemeriksa->pangkat_id = $request->input('pangkat_id');

        // store data
        $pemeriksa->save();

        // response
        $response = ['message' => $request->input('nama') . ' berhasil disimpan'];
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Pemeriksa $pemeriksa
     * @return Response
     */
    public function show(Pemeriksa $pemeriksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Pemeriksa $pemeriksa
     * @return Application|Factory|View
     */
    public function edit(Pemeriksa $pemeriksa)
    {
        $bidang = Bidang::pluck('nama', 'id');
        $pangkat = Pangkat::pluck('singkatan', 'id');
        $unitkerja = UnitKerja::pluck('nama', 'id');
        return view('pemeriksa.edit', [
            "pemeriksa" => $pemeriksa,
            "bidang" => $bidang,
            "pangkat" => $pangkat,
            "unitkerja" => $unitkerja
        ]);
    }

    public function update(Request $request, Pemeriksa $pemeriksa)
    {
        // validation rules
        $rules = [
            'nama' => 'required',
            'nrp' => 'required',
        ];

        // validate $_POST
        $this->validate($request, $rules);

        // insert user input ke db
        $pemeriksa->nama = $request->input('nama');
        $pemeriksa->nrp = $request->input('nrp');
        $pemeriksa->bidang_id = $request->input('bidang_id');
        $pemeriksa->pangkat_id = $request->input('pangkat_id');
        $pemeriksa->unitkerja_id = $request->input('unitkerja_id');

        // save data
        $pemeriksa->update();

        //response
        $response = ['message' => ucwords($request->input('nama')) . ' berhasil diubah'];
        return $response;
    }

    public function delete(Pemeriksa $pemeriksa)
    {
        return view('pemeriksa.delete', compact('pemeriksa'));
    }

    public function softdelete(Pemeriksa $pemeriksa)
    {
        // insert user input
        $pemeriksa->delete();

        //response
        $response = ['message' => 'Pemeriksa berhasil dihapus'];
        return $response;
    }
}
