<?php

namespace App\Http\Controllers;

use App\Polres;
use Yajra\DataTables\DataTables;

class PolresYajraController extends Controller
{
    public function api()
    {
        $model = Polres::query();
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.polres_action')
            ->addColumn('polda', function (Polres $polres) {
                return $polres->polda ? $polres->polda->nama : '';
            })
            ->rawColumns(['action', 'polda'])
            ->make(true);
    }
}
