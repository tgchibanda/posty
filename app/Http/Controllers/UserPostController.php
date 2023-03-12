<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user){

        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'maLike'])->where('user_id', $user->id)->simplePaginate(4); //we are egger loading the queries to reduce weight on requests
       //$posts = Post::simplePaginate(4);
       //dd($posts);
        return view('users.posts.index', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
