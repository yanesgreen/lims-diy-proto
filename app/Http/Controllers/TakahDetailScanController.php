<?php

namespace App\Http\Controllers;

use App\Takah;

class TakahDetailScanController extends Controller
{
    public function detailScan(Takah $takah)
    {
        return view('takah.dummies.index', compact('takah'));
    }
}
