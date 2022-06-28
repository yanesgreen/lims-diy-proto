<?php

namespace App\Http\Controllers;

use App\Satker;
use Yajra\DataTables\DataTables;

class SatkerYajraController extends Controller
{
    public function api()
    {
        $model = Satker::query();
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.satker_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
