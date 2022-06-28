<?php

namespace App\Http\Controllers;

use App\Polsek;
use Yajra\DataTables\DataTables;

class PolsekYajraController extends Controller
{
    public function api()
    {
        $model = Polsek::query();
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.polsek_action')
            ->addColumn('polres', function (Polsek $polsek) {
                return $polsek->polres ? $polsek->polres->nama : '';
            })
            ->rawColumns(['action', 'polres'])
            ->make(true);
    }
}
