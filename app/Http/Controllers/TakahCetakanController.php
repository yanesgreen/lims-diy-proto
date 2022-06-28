<?php

namespace App\Http\Controllers;

use App\Takah;

class TakahCetakanController extends Controller
{
    //================
//  Cetakan
//================
    public function cetakanPenerimaan(Takah $takah)
    {
        return view('takah.cetakan.penerimaan', compact('takah'));
    }

    public function cetakanPenyerahan(Takah $takah)
    {
        return view('takah.cetakan.penyerahan', compact('takah'));
    }
}
