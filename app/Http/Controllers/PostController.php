<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function addpost(Request $request) {
        $request->validate([
            'title' => 'required|string|max:140',
            'content' => 'required|string|max:500',
        ]);

        Post::Create([
            'user_id' => Auth::id(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        return redirect()->back()->with('success', 'Post created!');
    }
    
    // public function delpost($id) {
    //     $post = Post::findorfail($id);

    //     if ($post->user_id !== Auth::id()) {
    //         abort(403, 'Unauthorized action.');
    //     }

    //     $post->delete();

    //     return redirect()->back()->with('success', 'Post deleted');
    // }
}
