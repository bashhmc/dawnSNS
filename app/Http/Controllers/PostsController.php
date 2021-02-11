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

    public function index(Post $post,Request $request){
        // login user情報取得
        $auths = Auth::user();

        // タイムライン
        $id = Auth::id();
        $follow_ids = Follow::where('follower',$id)->pluck('follow')->toArray();
        $follow_ids[] = $id;
        $timeLines = $post->getTimelines($follow_ids) ;

        // 投稿create
        if ($request->filled('newPost'))
        {
            $user_post = $request->input('newPost');
            Post::create([
                'user_id' => $id,
                'posts' => $user_post,
            ]);
        return redirect('/top');
        }
        elseif($request->filled('editPost'))
        {
            $post_id = $request->input('id');
            $user_editPost = $request->input('editPost');

            Post::where('id',$post_id)->update(['post' => $user_editPost]);

            return redirect('/top');
        }
        elseif($request->filled('trashId'))
        {
            $post_id = $request->input('trashId');

            Post::where('id',$post_id)->delete();

            return redirect('/top');
        }

        return view('posts.index' , [ 'auths' => $auths , 'timeLines' => $timeLines]);

    }


}
