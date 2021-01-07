<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Auth;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Post $post){
        // login user情報取得
        $auths = Auth::user();

        $id = Auth::id();
        $follow_ids = Follow::where('follower',$id)->pluck('follow')->toArray();
        // ↑[3,4]
        $follow_ids[] = $id;
        // ↑[3,4,5] 結合
        $timeLines = $post->getTimelines($follow_ids) ;
        // $followPosts = Post::where('user_id',$follow_ids)->latest()->get();

        // $timeLines = ;

        // Follow+userのpost情報表示
        // $id = Auth::id();
        // $followerIds = Follow::where('follower',$id)->pluck('follow');
        // // ↑{3,4}
        // $followPosts = Post::where('user_id',$followerIds)->latest()->get();
        // ↑ここが違う？配列として出てこない？

        // 投稿create
        // もし値がなければそのまま
        // 値があればリダイレクト
        // if ($request->has(input('newPost')))
        // {
        // Post::create([
        //     'user_id' => Auth::id(),
        //     'posts' => $request->input('newPost'),
        // ]);
        // return back();
        // }

        return view('posts.index' , [ 'auths' => $auths , 'follow_ids' => $follow_ids]);

    }


}
