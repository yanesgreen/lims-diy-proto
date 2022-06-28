<?php

namespace App\Http\Controllers;

use App\User;
use Yajra\DataTables\DataTables;

class UserYajraController extends Controller
{
    public function api()
    {
        $model = User::query()
            ->where('aktif', 1);
        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('role', function (User $user) {
                if ($user->role) {
                    return $user->role->nama;
                }
                return "";
            })
            ->addColumn('action', 'partials.backend.actions.users_action')
            ->rawColumns(['action'])
            ->make(true);
    }
}
