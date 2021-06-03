<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login (Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('books');
        } else {
            return redirect()->route('loginPage')->with(['error' => 'Invalid Email/Password']);
        }
    }

    public function register(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        /**
        * Automatic Login After User Registered
        * */
        auth()->loginUsingId($user->id);

        return redirect()->route('books');
    }

    public function logout(){
        auth()->logout();

        return redirect()->route('loginPage');
    }
}
