<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = Post::query();
        $query->when($request->input('sort') == 'votes', function ($query) {
            $query->orderBy('votes', 'desc');
        })->when($request->input('sort') == '', function ($query) {
            $query->latest();
        });

        $posts = $query->paginate(10);
        return view('home', compact('posts'));
    }
}
