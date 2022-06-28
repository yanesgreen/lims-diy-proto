<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function landingPage()
    {
        return view('welcome');
    }

    public function dokupalfor()
    {
        return view('frontendpages.dokupalfor');
    }

    public function balmetfor()
    {
        return view('frontendpages.balmetfor');
    }

    public function fiskomfor()
    {
        return view('frontendpages.fiskomfor');
    }

    public function kimbiofor()
    {
        return view('frontendpages.kimbiofor');
    }

    public function narkobafor()
    {
        return view('frontendpages.narkobafor');
    }

    public function smile()
    {
        return view('frontendpages.smile');
    }

    public function welcome()
    {
        return view('frontendpages.welcome');
    }
}
