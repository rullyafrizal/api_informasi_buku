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
            return redirect()->route('login')->with(['error' => 'Invalid Email/Password']);
        }
    }

    public function postRegister(Request $request){
        $this->validate($request, [
            'username' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //User login otomatis setelah register
        auth()->loginUsingId($user->id);

        return redirect()->route('home');
    }

    public function logout(){
        auth()->logout();

        return redirect()->route('login');
    }
}
