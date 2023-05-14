<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
       
      ]);

      if(!auth()->attempt($request->only('email', 'password'), $request->remember ) ) {
        return back()->with('message', 'Incorrect Credentials');
      }

      //
     

      return redirect()->route('posts.index', ['user' => auth()->user()->username]);

      
    }
}
