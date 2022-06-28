<?php

namespace App\Http\Controllers;

use App\Polres;
use Illuminate\Http\Request;

class PolresSelectController extends Controller
{
    public function apiSelect(Request $request)
    {
        return $polres = Polres::where('polda_id', $request->polda)
            ->pluck('nama', 'id')
            ->prepend('Pilih Polres', '');
    }

    public function apiSelectEdit(Request $request)
    {
        return $polres = Polres::where('polda_id', $request->polda)
            ->pluck('nama', 'id')
            ->prepend('Tidak Ada', 0);
    }
}
