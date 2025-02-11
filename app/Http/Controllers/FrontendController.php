<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function index()
    {
        $portofolio = DB::table('portofolio')->get();
        return view('index', compact('portofolio'));
    }
}
