<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetoutController extends Controller
{
    public function getOut(){
        auth()->logout();
        return redirect()-> route('homeindex');
    }
}


