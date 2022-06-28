<?php

namespace App\Http\Controllers;

use App\Subbidang;
use Illuminate\Http\Request;

class SubbidangSelectController extends Controller
{
    public function apiSelectTakah(Request $request)
    {
        return $subbidang = Subbidang::where("bidang_id", $request->bidang_id)
            ->pluck('nama', 'kode')
            ->prepend("---", "");
    }

    public function apiSelectCreate(Request $request)
    {
        return $subbidang = Subbidang::where("bidang_id", $request->bidang_id)
            ->pluck('nama', 'id')
            ->prepend("---", "");
    }
}
