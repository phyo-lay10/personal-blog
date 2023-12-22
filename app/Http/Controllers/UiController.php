<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\LikesDislike;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use App\Models\StudentCount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function index()
    {
        $skills = Skill::paginate(10);
        $projects = Project::all();
        $studentCounts = StudentCount::find(1);
        $posts = Post::latest()->take(5)->get();
        return view('ui-panel.index', compact('skills', 'projects', 'studentCounts', 'posts'));
    }
    public function postsIndex()
    {
        $categories = Category::paginate(10);
        $posts = Post::latest()->paginate(5);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }
    public function postDetailsIndex($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $post = Post::find($id);

        $likes = LikesDislike::where('post_id', $id)->where('type', 'like')->get();
        $dislikes = LikesDislike::where('post_id', $id)->where('type', 'dislike')->get();
        // $dislikes = LikesDislike::where('post_id', $id)->where('type', 'dislike')->count();
        $likeStatus = LikesDislike::where('post_id', $id)->where('user_id', Auth::user()->id)->first();

        $comments = Comment::where('post_id', $id)->where('status', 'show')->get();
        return view('ui-panel.post-details', compact('post', 'likes', 'dislikes', 'likeStatus', 'comments'));
    }

    public function search(Request $request)
    {
        $searchData = $request->search_data;
        $categories = Category::paginate(10);

        $posts = Post::where('title', 'LIKE', '%' . $searchData . '%')->orWhere('content', 'like', '%' . $searchData . '%')->orWhereHas('category', function ($category) use ($searchData) {
            $category->where('name', 'like', '%' . $searchData . '%');
        })->paginate(5);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }

    public function searchByCategory($id)
    {
        $categories = Category::paginate(10);
        $posts = Post::where('category_id', $id)->paginate(5);
        return view('ui-panel.posts', compact('categories', 'posts'));
    }
}