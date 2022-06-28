<?php

namespace App\Http\Controllers;

use App\Penyidik;
use Illuminate\Http\Request;

class PenyidikSearchController extends Controller
{
    public function search(Request $request)
    {
        $no_identitas = $request->no_identitas;
        $penyidik = Penyidik::with(['jenisidentitas', 'pangkat'])->where('no_identitas', $no_identitas)->first();

        if ($penyidik) {
            return $response = ["message" => "Identitas Ditemukan", "penyidik" => $penyidik];
        }
        return $response = ["message" => "Identitas Tidak Ditemukan"];
    }
}
