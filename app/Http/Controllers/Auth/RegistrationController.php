<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.registration');
    }

    public function store(Request $request){
        // dd("this is a test");
        // dd($request->get('name')) or dd($request->name)

        //validate information
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            
        ]);

        //store the details
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //sign in user
       
        /*
        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        */

        auth()->attempt($request->only('email', 'password'));

        //redirect when done
        
        return redirect()-> route('dashboard');

        

       
    }
}
