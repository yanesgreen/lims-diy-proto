<?php

namespace App\Http\Controllers;

use App\Bidang;
use App\Subbidang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SubbidangYajraController extends Controller
{
    public function api(Bidang $bidang)
    {
        $model = Subbidang::query()
            ->where(['bidang_id' => $bidang->id]);
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.subbidang_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
