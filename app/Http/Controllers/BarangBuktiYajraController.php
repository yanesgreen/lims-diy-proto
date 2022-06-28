<?php

namespace App\Http\Controllers;

use App\Takah;
use Yajra\DataTables\DataTables;

class BarangBuktiYajraController extends Controller
{
    public function api(Takah $takah)
    {
        $model = $takah->barangbukti()->with('jenisbb');
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.barangbukti_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
