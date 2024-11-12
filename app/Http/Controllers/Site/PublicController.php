<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function home()
    {
        $planos = DB::table('planos')->get();
        return view('site.home', compact('planos'));
    }

    public function sobre()
    {
        return view('site.sobre');
    }
}
