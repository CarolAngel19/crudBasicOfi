<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['categories' => '', 'posts' => Post::all()]);

    }
}
