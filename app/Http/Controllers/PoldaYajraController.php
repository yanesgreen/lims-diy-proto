<?php

namespace App\Http\Controllers;

use App\Polda;
use Yajra\DataTables\DataTables;

class PoldaYajraController extends Controller
{
    public function api()
    {
        $model = Polda::query();
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.polda_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
