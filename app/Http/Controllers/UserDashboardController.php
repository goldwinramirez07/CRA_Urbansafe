<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class UserDashboardController extends Controller
{
    public function index() {
        $posts = Post::latest()->take(3)->get();
        return view('users.dashboard', compact('posts'));
    }
}
