<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        
            $post->malike()->create([
                'user_id' => $request->user()->id,
            ]);

            //the check below will prevent emails being sent as a spam
            if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){
                Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
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
