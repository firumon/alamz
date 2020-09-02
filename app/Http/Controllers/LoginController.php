<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        $credentials = array_merge(request()->only(['email','password']),['status' => 'Active']);
        if(Auth::attempt($credentials)){
            Activity::activity('User login');
            return redirect()->intended('home');
        }
        return back()->withInput()->with(['error' => true]);
    }
}
