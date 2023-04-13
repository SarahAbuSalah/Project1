<?php

namespace App\Http\Controllers;

use App\Models\work;
use App\Models\offer;
use Illuminate\Http\Request;

class webSiteController extends Controller
{
    public function home()
    {
        $latest_work = work::orderByDesc('id')->limit(6)->get();

        $latest_offer = offer::orderByDesc('id')->limit(6)->get();

        return view('webSite.home' , compact('latest_work' , 'latest_offer'));
    }
}
