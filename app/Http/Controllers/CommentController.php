<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $postId)
    {
        $request->validate([
            "text" => "required",
        ]);

        Comment::create([
            "post_id" => $postId,
            "user_id" => auth()->user()->id,
            "text" => $request->text,
        ]);
        return back();
    }
}
