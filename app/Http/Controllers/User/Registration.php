<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;

class Registration extends Controller
{
    public function index() {
        return view('user.register');
    }

    public function verify(UserRegisterRequest $request) {
        $user = User::create([
            'first_name' => trim($request->input('first_name')),
            'last_name' => trim($request->input('last_name')),
            'mobile_num' => $request->input('mobile_num'),
            'email' => strtolower($request->input('email')),
            'address' => $request->input('address'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'gender' => $request->input('gender'),
            'user_type' => 'customer',
        ]);

        session()->flash('sucess', 'Account sucessfully created!');
        return redirect()->route('login');
    }
}
