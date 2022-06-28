<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Yajra\DataTables\DataTables;

class JabatanYajraController extends Controller
{
    public function api()
    {
        $model = Jabatan::query();
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.jabatan_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
