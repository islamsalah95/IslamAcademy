<?php

namespace App\Http\Controllers;

use App\Traits\ApiTraits;
use Illuminate\Http\File;
use App\Models\web\Courses;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\webStore\StorecoursesRequest;

class MycourseController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecoursesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecoursesRequest $request)
    {
   $fileName=$request->file('image')->getClientOriginalName();

   if ($request->hasFile('image')) {

    $request->image->move(public_path('assets\images'),$fileName);


    $path = asset('assets/images/'.$fileName) ;//http://127.0.0.1:8000/assets/images/test.jpg

}


      $courses=Courses::insert([
            'coach'=>$request->coach,
            'title'=>$request->title,
            'desc_en'=>$request->desc_en,
            'des_ar'=>$request->des_ar,
            'price' =>$request->price,
            'image'=>$path,
        ]);


        return ApiTraits::data(['namefile'=>$fileName],'success insert',200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\web\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function showAllCourses()
    {
         $showAllCourses = Courses::get();

         $url = url(public_path('assets/images/courses/'));

          Arr::add($showAllCourses, 'path',  $url);

          return ApiTraits::data(compact('showAllCourses'),$message='fetch success',$statusCode=200);


    }


    public function showOneDetails($id)
    {
         $showAllCourses = Courses::find($id);

         return ApiTraits::data(compact('showAllCourses'));

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\web\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(courses $courses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecoursesRequest  $request
     * @param  \App\Models\web\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecoursesRequest $request, courses $courses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\web\courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

    $comment =Courses::find($id);
    $RemovePhotoPath = public_path( "assets\images\\{$comment->image}");
    if (file_exists($RemovePhotoPath)) {
        unlink($RemovePhotoPath);
    }
       Courses::where('id', $id)->delete();

        return ApiTraits::successMessage($message=" delet success",$statusCode=200);

    }
}
