<?php

namespace App\Http\Controllers;

use App\Models\LikesDislike;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeDislikeController extends Controller
{
    public function like($postId)
    {
        $isExist = LikesDislike::where("post_id", $postId)->where("user_id", Auth::user()->id)->first();
        // $isExist = LikesDislike::where("post_id", $postId)->where("user_id", Auth::user()->id)->exists();

        if ($isExist) {
            if ($isExist->type == "like") {
                return back();
            } else {
                LikesDislike::where('id', $isExist->id)->update([
                    'type' => 'like',
                ]);
                return back();
            }

        } else {
            LikesDislike::create([
                "post_id" => $postId,
                "user_id" => Auth::user()->id,
                "type" => "like",
            ]);
            return back();
        }

        // return back();
    }
    public function dislike($postId)
    {
        $isExist = LikesDislike::where('post_id', $postId)->where('user_id', Auth::user()->id)->first();

        if ($isExist) {
            if ($isExist->type == 'dislike') {
                return back();
            } else {
                LikesDislike::where('id', $isExist->id)->update([
                    'type' => 'dislike',
                ]);
                return back();
            }
        } else {
            LikesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'dislike',
            ]);
        }
    }
}
