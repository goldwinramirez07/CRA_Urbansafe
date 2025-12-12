<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function addcomment(Request $request, $id)
    {
        //
        $request-> validate([
            'comment' => 'required|string|max:140',
        ]);

        Comment::create([
            'post_id' => $id, 
            'user_id' => auth()->id(),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Comment published.');
    }

    public function updatecomment(Request $request, $id)
    {
        $request-> validate([
            'comment' => 'required|string|max:140',
        ]);

        $comment = Comment::findOrFail($id);
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', 'Comment updated.');
    }

    public function deletecomment($id)
    {
        $comment = Comment::findOrFail($id);


        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted.');
    }

}
