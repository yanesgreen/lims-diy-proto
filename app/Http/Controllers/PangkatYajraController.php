<?php

namespace App\Http\Controllers;

use App\Pangkat;
use Yajra\DataTables\DataTables;

class PangkatYajraController extends Controller
{
    public function api()
    {
        $model = Pangkat::query();
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.pangkat_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
