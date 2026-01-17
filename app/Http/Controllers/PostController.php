<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function viewPosts() {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function postdetails($id) {
        $post = Post::findOrFail($id);
        $comments = Comment::latest()->where('post_id', $id)->paginate(10);
        return view('posts.post', compact('post', 'comments'));
    }

    public function addpost(Request $request) {
        $request->validate([
            'title' => 'required|string|max:140',
            'content' => 'required|string|max:500',
        ]);

        Post::Create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'body' => $request->content,
        ]);
        return redirect()->back()->with('success', 'Post created!');
    }
    
    public function delpost($id) {
        $post = Post::findorfail($id);

        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('posts.view')->with('success', 'Post deleted');
    }

    public function updatePost(Request $request, $id) {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:140',
            'content' => 'required|string|max:500',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->content,
        ]);

        return redirect()->route('posts.details', $id)->with('success', 'Post updated!');
    }
}
