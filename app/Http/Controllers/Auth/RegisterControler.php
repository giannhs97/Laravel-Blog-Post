<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterControler extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validates the user
        $this -> validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);
        
        User :: create([
            'name' => $request -> name,
            'username' => $request -> username,
            'email' => $request -> email,
            'password' => Hash :: make($request -> password)
        ]);

        //user sing-in
        auth() -> attempt($request -> only('email' , 'password'));  

        //registeres the user
        return redirect() -> route('dashboard');
    }
}
