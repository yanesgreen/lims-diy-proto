<?php

namespace App\Http\Controllers;

use App\JenisKasus;
use Yajra\DataTables\DataTables;

class JenisKasusYajraController extends Controller
{
    public function api()
    {
        $model = JenisKasus::query();
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.jeniskasus_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
