<?php

namespace App\Http\Controllers;

use App\Models\web\Cart;
use App\Traits\ApiTraits;
use App\Models\web\Paying;
use Illuminate\Http\Request;
use App\Models\web\Playlists;
use Illuminate\Support\Facades\Auth;

class PayingsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($cartItemId)
    {

 $user=Auth::guard('sanctum')->user();

$cartItem=Cart::where([
    ['id',$cartItemId],
    ['user_id',$user->id],
    ])->first();

Paying::insert([
    'course_id'=>$cartItem->course_id,
    'course_title'=>$cartItem->course_title,
    'course_price'=>$cartItem->course_price,
    'user_id'=>$user->id,//
    'user_name'=>$user->name,//
    'course_image'=>$cartItem->course_image,
]);

Cart::where('id',$cartItemId)->delete();

return ApiTraits::successMessage($message=" paying success",$statusCode=200);

    }




    public function showPayingCourse()
    {
        $user=Auth::guard('sanctum')->user();


        $showPayingCourse = Paying::where('user_id',$user->id)->get();

         return ApiTraits::data(compact('showPayingCourse'));

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
