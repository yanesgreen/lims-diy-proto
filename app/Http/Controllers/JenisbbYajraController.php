<?php

namespace App\Http\Controllers;

use App\Jenisbb;
use Yajra\DataTables\DataTables;

class JenisbbYajraController extends Controller
{
    public function api()
    {
        $model = Jenisbb::query();
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('bidang', function (Jenisbb $jenisbb) {
                return $jenisbb->bidang ? $jenisbb->bidang->nama : '';
            })
            ->addColumn('action', 'partials.backend.actions.jenisbb_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
