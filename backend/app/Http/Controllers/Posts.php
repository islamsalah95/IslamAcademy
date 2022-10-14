<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Posts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function showPosts()
    {
        $comments=Comments::all();

        // $products=Comments::get();
        // $products=DB::table('comments')->get();
        // return view("showPosts",compact('products')) ;
          return ApiTraits::data(compact('comments'));

      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("storePosts");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
            'image'=>'nullable',

        ]);

        // DB::table('comments')->insert([
        //     'title'=>$request->title,
        //     'body'=>$request->body
        // ]);

        // return redirect()->back()->with('success','add post succsessful');
        if ($request->hasFile('image')) {

            $file=$request->file('image')->getClientOriginalName();
            $request->image->move(public_path('assets/images'),$file);
            }

            DB::table('comments')->insert([
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=>$file

        ]);

        // $data=Comments::create([
        //     'title'=>$request->title,
        //     'body'=>$request->body,
        //     'image'=>$fileName

        // ]);
        return ApiTraits::successMessage('created successfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products=Comments::all();

        // $products=Comments::get();
        // $products=DB::table('comments')->get();
        return view("posts",compact('products')) ;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //   $posts=DB::table('comments')->find($id);
    //   return view('editPosts',compact('posts'));
    $posts=Comments::findOrFail($id);
    return ApiTraits::data(compact('posts'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data=DB::table('comments')->where("id",$id)->update([
            'title'=>$request->title,
            'body'=>$request->body
        ]);

        // return redirect()->back()->with('success','update post succsessful');

        // $data=Comments::where("id",$id)->update([
        //        'title'=>$request->title,
        //        'body'=>$request->body
        //     ]);
        return ApiTraits::successMessage('updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $comment =Comments::find($id);
        $RemovePhotoPath = public_path( "assets\images\\{$comment->image}");
        if (file_exists($RemovePhotoPath)) {
            unlink($RemovePhotoPath);
        }
    //    DB::table('comments')->where("id",$id)->delete();
    //    return redirect()->back()->with('success','delet succsessful');
    $data=Comments::destroy($id);
    return response()->json($data, 200);
    }
}
