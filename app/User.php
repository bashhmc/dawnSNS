<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use \Auth;

class User extends Authenticatable
{
    use Notifiable;

    // public function follows()
    // {
    //     return $this->belongsTo(Follow::class, 'id', 'id');
    // }

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
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    // public function followPost()
    // {
    //     $id = Auth::id();
    //     $followerId = DB::table('follows')->where('follower',$id)->select('follow')->get();
    //     $followsPosts = DB::table('posts')->where('user_id',$followerId)->latest()->get();
    //     return $followPosts;
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
