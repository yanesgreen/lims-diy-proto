<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class StorageLinkController extends Controller
{
    public function link()
    {
        Artisan::call('storage:link');
        return redirect()->route('home')->with('success', 'storage:link berhasil!');
    }
}
