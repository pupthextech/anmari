<?php

namespace App\Http\Controllers\User;

use App\Models\User;
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

        $user = User::where('username',$request->username)->first();

        if (auth()->attempt($credentials)) {
            // set session
            $user = User::where('username',$request->username)->first();
            $request->session()->put('user_details', $user);
            dd($request->session()->all());
        } else{
            session()->flash('message', 'Invalid credentials');
            return redirect()->back();
        }
    }
}
