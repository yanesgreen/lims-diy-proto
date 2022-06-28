<?php

namespace App\Http\Controllers;

use App\Lembaga;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LembagaYajraController extends Controller
{
    public function api()
    {
        $model = Lembaga::query();
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.lembaga_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
