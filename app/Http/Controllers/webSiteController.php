<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webSiteController extends Controller
{
    public function home()
    {
        return view('webSite.home');
    }
}
