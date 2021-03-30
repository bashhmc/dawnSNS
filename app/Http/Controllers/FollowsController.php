<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class FollowsController extends Controller
{
    public function followList(Post $post){
        $auths = Auth::user();
        // follow list & timeline
        $id = Auth::id();
        $follow_ids = Follow::where('follower',$id)->pluck('follow')->toArray();
        $follow_id_lists = User::find($follow_ids);
        $timeLines = $post->getTimelines($follow_ids);

        return view('follows.followList',[ 'auths' => $auths , 'follow_id_lists' => $follow_id_lists , 'timeLines' => $timeLines]);
    }

    public function followerList(Post $post){
        $auths = Auth::user();
        // follower list & timeline
        $id = Auth::id();
        $follower_ids = Follow::where('follow',$id)->pluck('follower')->toArray();
        $follow_id_lists = User::find($follower_ids);
        $timeLines = $post->getTimelines($follower_ids);

        return view('follows.followerList' , [ 'auths' => $auths , 'follow_id_lists' => $follow_id_lists , 'timeLines' => $timeLines]);
    }
}
