<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct()
    {
        //with this constructor we can give access to this controller only to signed in users
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request){
        //dd($post);
        //dd($post->likedBy($request->user())); this will return true or false

        if($post->likedBy($request->user())){
                //if true
                return response(null, 409);
        }
        else {
            $post->malike()->create([
                'user_id' => $request->user()->id,
            ]);
        }
        return back();
    }

    public function bvisaLike(Post $post, Request $request){
        //dd($post);
            $request->user()->likes()->where('post_id', $post->id)->delete();
            // query is get the authenticated user from the likes table, where post_id in the likes table is the one clicked
            //the authenticated user is matched with their likes in the likes table because of the relationship that was created before
            return back();

    }
}
