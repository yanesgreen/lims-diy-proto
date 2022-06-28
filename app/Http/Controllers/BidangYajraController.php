<?php

namespace App\Http\Controllers;

use App\Bidang;
use Yajra\DataTables\DataTables;

class BidangYajraController extends Controller
{
    public function api()
    {
        $model = Bidang::query();

        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('action', 'partials.backend.actions.bidang_action')
            ->addColumn('subbidang_list', 'partials.backend.actions.subbidang_list')
            ->rawColumns(['action', 'subbidang_list'])
            ->make(true);
    }
}
