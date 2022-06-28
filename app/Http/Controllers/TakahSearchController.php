<?php

namespace App\Http\Controllers;

use App\JenisKasus;
use App\Polda;
use App\Takah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TakahSearchController extends Controller
{
    public function pencarianIndex()
    {
        return view('takah.pencarian.index');
    }

    public function pencarianByTakah(Request $request, Takah $takah)
    {

        $takah = null;

        if ($request->has('nomor')) {
            if (Auth::user()->role->nama === "kaurmin") {
                $takah = Takah::where('nomor', 'LIKE', "%{$request->nomor}%")
                    ->where(['bidang_id' => Auth::user()->bidang_id]);
            } else {
                $takah = Takah::where('nomor', 'LIKE', "%{$request->nomor}%");
            }
        }

        if (!empty($takah)) {
            $takah = $takah->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('takah.pencarian.bytakah', compact('takah'));

    }

    public function pencarianByTersangka(Request $request, Takah $takah)
    {

        $polda = Polda::orderBy('nomorurut', 'asc')->pluck('nama', 'id');
        $jeniskasus = JenisKasus::pluck('nama', 'id');
        $takah = null;

        if ($request->has('tersangka')) {
            if (Auth::user()->role->nama === "kaurmin") {
                $takah = Takah::where(['bidang_id' => Auth::user()->bidang_id])
                    ->whereHas('tersangka', function ($query) use ($request) {
                        $query->where('nama', 'LIKE', "%{$request->tersangka}%");
                    });
            } else {
                $takah = Takah::whereHas('tersangka', function ($query) use ($request) {
                    $query->where('nama', 'LIKE', "%{$request->tersangka}%");
                });
            }
        }

        if ($request->has('jeniskasus_id')) {
            $takah->where('jeniskasus_id', $request->jeniskasus_id);
        }

        if ($request->has('polda')) {
            if ($request->polres) {
                if ($request->polsek) {
                    $takah->whereHas('asaltakah', function ($query) use ($request) {
                        $query->where('polsek_id', $request->polsek);
                    });
                } else {
                    $takah->whereHas('asaltakah', function ($query) use ($request) {
                        $query->where('polres_id', $request->polres);
                    });
                }
            } else {
                $takah->whereHas('asaltakah', function ($query) use ($request) {
                    $query->where('polda_id', $request->polda);
                });
            }
        }

        if (!empty($takah)) {
            $takah = $takah->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('takah.pencarian.bytersangka', [
            'polda' => $polda,
            'jeniskasus' => $jeniskasus,
            'takah' => $takah,
        ]);

    }
}
