<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        //with this constructor we can give access to this controller only to signed in users
        $this->middleware(['auth']);
    }

    public function index(){

        //dd(auth()->user()); check if the user is signed in 

        return view('dashboard');
    }
}