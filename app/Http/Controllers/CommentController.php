<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\Comment;

class CommentController extends Controller
{
    public function addcomment(Request $request)
    {
        //
        $request-> validate([
            'comment' => 'required|string|max:140',
        ]);

        Comment::create([
            'post_id' => $request->post_id, 
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment published.');
    }
}
