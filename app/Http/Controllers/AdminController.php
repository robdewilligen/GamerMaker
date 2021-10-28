<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['AdminAuthenticated']);
    }

    public function index()
    {
        $posts = Post::all();

        return view('admin', ['posts' => $posts]);
    }
}
