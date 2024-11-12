<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function home()
    {
        return view('site.home');
    }

    public function sobre()
    {
        return view('site.sobre');
    }
}
