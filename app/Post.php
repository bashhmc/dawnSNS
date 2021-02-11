<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getTimelines(Array $follow_ids)
    {
        return $this->whereIn('user_id',$follow_ids)->orderBy('created_at','DESC')->get();
    }

    public function getFollowerTimelines(Array $follower_ids)
    {
        return $this->whereIn('user_id',$follower_ids)->orderBy('created_at','DESC')->get();
    }

    public function userPost(Int $user_id, Int $users_id)
    {
        return  $user_id == $users_id;
    }

    protected $fillable = [
        'user_id', 'posts'
    ];

    // public $timestamps = false;
}
