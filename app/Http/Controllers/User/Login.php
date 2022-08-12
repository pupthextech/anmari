<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('user/login');
    }

    public function verify(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->except(['_token']);

        // $user = User::where('name',$request->name)->first();

        if (auth()->attempt($credentials)) {
            die('logged in');
        } else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }
}
