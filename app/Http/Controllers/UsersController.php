<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Models\User;
use App\Models\Follow;

class UsersController extends Controller
{

    public function profile($id){
        $auths = Auth::user();

        $user_profiles = User::where('id',$id)->get();

        return view('users.profile',['auths'=>$auths , 'user_profiles'=>$user_profiles]);
    }

    public function index(Request $request)
    {
        $auths = Auth::user();
        $id = Auth::id();

        if($request->filled('searchInput'))
        {
            $searchInput = $request->input('searchInput');

            $searchAlls = User::where('username','LIKE',"%$searchInput%")->whereNotIn('id', [$id])->get();

            return view('users.search' , [ 'auths' => $auths , 'searchAlls' => $searchAlls,'searchInput' => $searchInput]);
        }
        elseif($request->filled('follow'))
        {
            $followId = $request->input('follow');

            Follow::create([
                'follow' => $followId,
                'follower' => $id,
            ]);

            return redirect('/search');
        }
        elseif($request->filled('unfollow'))
        {
            $unfollowId = $request->input('unfollow');

            Follow::where('follow',$unfollowId)->where('follower',$id)->delete();

            return redirect('/search');
        }

        $searchAlls = User::whereNotIn('id', [$id])->get();
        return view('users.search' , [ 'auths' => $auths , 'searchAlls' => $searchAlls]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
