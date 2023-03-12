<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        //with this constructor we can give access to this controller only to signed in users
        $this->middleware(['auth']);
    }

    public function index(){

        //dd(auth()->user()); check if the user is signed in 
        //dd(auth()->user()->posts); // not calling the posts() function because we do not want to return the relatioship but the collection

        

        return view('dashboard');
    }
}
