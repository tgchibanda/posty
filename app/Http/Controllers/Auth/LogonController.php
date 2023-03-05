<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogonController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index(){
        return view('auth.logon');
    }

    public function getIn(Request $request){
        // dd($request->remember);
        // dd($request->get('name')) or dd($request->name)

        //validate information
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            
        ]);


        //sign in user
       
        /*
        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        */

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        }

        //redirect when done
        
        return redirect()-> route('dashboard');

    }
}
