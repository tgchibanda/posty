<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class GetpostsController extends Controller
{
    public function index(){

        $posts = Post::get(); // collection of posts
        //dd($posts);

        return view('posts.posts', [
            'posts' => $posts // passing the collection of posts as an array to the index view
        ]);
    }

    public function store(Request $request){
        // dd("this is a test");
         //dd($request->get('post')); // or dd($request->post);

        //validate information
        $this->validate($request, [
            'post' => 'required|max:255'
        ]);

        //store the details

        //we can get the posts() function from the relationship from the user class and create the fields for the fillables
        $request->user()->posts()->create([
                'body'=> $request->post,
                //'user_id' => auth()->user()->id, //this line is ommitted because of the relationship of the user and the posts
        ]);

        return back();

        /* the bellow is calling the class then create a user. Its the same thing but longer
        
        Post::create([
            'body' => $request->post,
            'user_id' => auth()->user()->id, //short hand is auth()->id()
        ]);

        */


        //redirect when done
        
        return redirect()-> route('getposts');

        

       
    }
}
