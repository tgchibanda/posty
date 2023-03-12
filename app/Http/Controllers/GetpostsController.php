<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetpostsController extends Controller
{

    public function __construct()
    {
        //with this constructor we can give access to this controller only to signed in users
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }


    public function index(){

        //$posts = Post::get(); // collection of posts could be a million
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'maLike'])->simplePaginate(4); //we are egger loading the queries to reduce weight on requests
       //$posts = Post::simplePaginate(4);

        //dd($posts);

        return view('posts.index', [
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

        //$authenticated_user = $request->user();
        //dd($authenticated_user);

        //the first part will return the user model of the authenticated user, then in that model we have a relationship with the posts function which we can then call to create a post
        

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

    public function show(Post $post){
        
       //dd($post);
        //$posts = $post;
        // this is passing a model which is different from passing a collection. There is no need for a foreach in the  view  as the foreach will get each model from the collection
        return view('posts.show', [
            'posts' => $post
        ]);

       

    }
}
