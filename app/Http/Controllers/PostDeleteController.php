<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostDeleteController extends Controller
{
    public function __construct()
    {
        //with this constructor we can give access to this controller only to signed in users
        $this->middleware(['auth']);
    }

    public function bvisaPost(Post $post, Request $request){
        //dd($post);
            //$request->user()->posts()->where('id', $post->id)->delete();
            // query is get the authenticated user from the posts table, where id in the likes table is the one clicked
            //the authenticated user is matched with their likes in the likes table because of the relationship that was created before

            if (!$post->postBelongsTo(auth()->user())){
                dd("No you cannot go behind the system like that.");
            }
            $post->delete();
            
            return back();

    }
}
