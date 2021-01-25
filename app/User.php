<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use \Auth;

class User extends Authenticatable
{
    use Notifiable;

    public function followsCount()
    {
        $id = Auth::id();
        $followCount = DB::table('follows')->where('follow', $id)->count();
        return $followCount;
    }

    public function followersCount()
    {
        $id = Auth::id();
        $followerCount = DB::table('follows')->where('follower', $id)->count();
        return $followerCount;
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'user_id', 'id');
    }

    public function follows()
    {
        return $this->belongsToMany(Follow::class, 'follows', 'follow', 'follower');
    }

    public function isFollowing(Int $user_id , Int $users_id)
    {
        return (boolean) Follow::where('follower',$user_id)->where('follow',$users_id)->first(['id']);
    }

    // public function userPost(Int $user_id, Int $users_id)
    // {
    //     return  $user_id == $users_id;
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $remember_token = false;

    protected $hidden = [
        'password', 'remember_token',
    ];

}
