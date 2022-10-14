<?php

namespace App\Http\Controllers;

use App\Models\Viewer;
use App\Traits\ApiTraits;
use App\Models\web\Paying;
use App\Models\web\Courses;
use Illuminate\Http\Request;
use App\Models\web\Playlists;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\webStore\StoreplaylistsRequest;

class PlaylistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewInc(Request $request)
    {

    $user=Auth::guard('sanctum')->user();
    $viewer=Viewer::where([['viewers_id',$request->id],['user_id',$user->id]])->exists();
    // dd($viewer);
if ($viewer) {

        return  ApiTraits::errorMessage(['error'=>'this user already add view '],$message='error', $statusCode=404);

        }else {
        $a= Playlists::where('id',$request->id)->increment('viewers' ,1);

     Viewer::insert([
    'viewers_id'=>$request->id,
    'user_id'=>$user->id,
     ]);

// dd($a);

return ApiTraits::successMessage($message=" viwer increment success",$statusCode=200);
    }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreplaylistsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreplaylistsRequest $request)
    {

       $test=Courses::find($request->course_id)->first();

        $fileName=$request->file('video')->getClientOriginalName();

        if ($request->hasFile('video')) {

        $request->video->move(public_path('assets\videos\\'.$test->title),$fileName);

        $path = asset('assets/videos/'.$test->title.'/'.$fileName);

    }




        Playlists::insert([
            'course_id'=>$request->course_id,
            'video'=>$path,
            'viewers'=>$request->viewers,
            'content'=>$request->content,
        ]);

        return ApiTraits::successMessage($message=" insert success",$statusCode=200);


    }


    public function showPlaylistVideos($courseId)
    {
        $user=Auth::guard('sanctum')->user();

        $PayingCourse = Paying::where([
            ['user_id',$user->id],
            ['course_id',$courseId]
        ])->exists();

if (!$PayingCourse) {

    return ApiTraits::errorMessage(['notpay'=>'notpay must pay first'],$message='notpay must pay first');

}else {


    $showPlaylistVideos = Playlists::where('course_id',$courseId)->get();

    return ApiTraits::data(compact('showPlaylistVideos'));

}



    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\web\playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function show(playlists $playlists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\web\playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function edit(playlists $playlists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateplaylistsRequest  $request
     * @param  \App\Models\web\playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateplaylistsRequest $request, playlists $playlists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\web\playlists  $playlists
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
    $Playlists =Playlists::find($id);
    $RemovePhotoPath = public_path( "assets/videos/Playlists\\{$Playlists->video}");
    if (file_exists($RemovePhotoPath)) {
        unlink($RemovePhotoPath);
    }
    Playlists::where('id', $id)->delete();

        return ApiTraits::successMessage($message=" delet success",$statusCode=200);

    }



}

