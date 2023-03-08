<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $community = Community::all();
        return view('home', compact('community'));
    }
}
