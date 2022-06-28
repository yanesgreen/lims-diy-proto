<?php

namespace App\Http\Controllers;

use App\Pemeriksa;
use Yajra\DataTables\DataTables;

class PemeriksaYajraController extends Controller
{
    public function api()
    {
        $model = Pemeriksa::with(['bidang', 'pangkat', 'unitkerja'])->select('pemeriksa.*');
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.pemeriksa_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
