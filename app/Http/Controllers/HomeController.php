<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Post;
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
        // order by most voted
        // and order by lattest post
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        $communities = Community::all();
        return view('home', compact('communities', 'posts'));
    }
}
