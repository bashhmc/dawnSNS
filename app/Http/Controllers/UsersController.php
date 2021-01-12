<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;


class UsersController extends Controller
{
    //
    public function profile(){
        if(Auth::check)
        {
            return view('users.profile');
        }
        //falseだった場合は、return view('/login');になる？
    }

    public function search(){
        if(Auth::check)
        {
        return view('users.search');
        }
        //falseだった場合は、return view('/login');になる？
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
