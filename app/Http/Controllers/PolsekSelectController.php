<?php

namespace App\Http\Controllers;

use App\Polsek;
use Illuminate\Http\Request;

class PolsekSelectController extends Controller
{
    public function apiSelect(Request $request)
    {
        return $polsek = Polsek::where('polres_id', $request->polres)
            ->pluck('nama', 'id')
            ->prepend('Pilih Polsek', '');
    }

    public function apiSelectEdit(Request $request)
    {
        return $polsek = Polsek::where('polres_id', $request->polres)
            ->pluck('nama', 'id')
            ->prepend('Tidak Ada', 0);
    }
}
