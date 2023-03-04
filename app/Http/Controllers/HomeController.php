<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::orderByDesc('id')->get();

        return view('home', ['posts' => $posts]);
    }

    public function about()
    {
        return view('about');
    }
}
