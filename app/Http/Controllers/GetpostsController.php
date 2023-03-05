<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetpostsController extends Controller
{
    public function index(){
        return view('posts.home');
    }
}
