<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //


    public function  storeComment(Request $request){

      $user=Auth::guard('sanctum')->user();

        $request->validate([
            'comment' => 'required|string',
            'playlist_id' => 'required|integer',
        ]);

        Comment::insert( [
            'comment'=>$request->comment,
            'playlist_id'=>$request->playlist_id,
            'user_id'=>$user->id,
            'user_name'=>$user->name,

        ]);

        return ApiTraits::successMessage($message=" insert success",$statusCode=200);

    }


    public function  showComment(Request $request){

        // dd($request->playlistid);
        $Comments= DB::table('comments')->where('playlist_id',$request->playlist_id)->get();

        return ApiTraits::data(compact('Comments'),$message='fetch success Comments',$statusCode=200);

     }
}
