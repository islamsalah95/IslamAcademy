<?php

namespace App\Http\Controllers;

use App\Models\web\Cart;
use App\Traits\ApiTraits;
use App\Models\web\Paying;
use App\Models\web\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatsController extends Controller
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
    public function store($courseid)
    {
        $user=Auth::guard('sanctum')->user();

        $cartexist=Cart::where([['course_id',$courseid],['user_id',$user->id]])->exists();
// dd($cartexist);
        if ($cartexist) {

 return  ApiTraits::errorMessage(['error'=>'this item already add to cart '],$message='error', $statusCode=404);


        }
        else{


            $payings=Paying::where([[ 'course_id',$courseid],[ 'user_id',$user->id],])->exists();
        //   dd($payings);

            if (!$payings) {

                $courses=Courses::where('id',$courseid)->first();

                Cart::insert([
                    'course_id'=>$courseid,
                    'course_title'=>$courses->title,
                    'course_price'=>$courses->price,
                    'user_id'=>$user->id,
                    'course_image'=>$courses->image,
                ]);

                return ApiTraits::successMessage('created successfuly');

        }else{

     return  ApiTraits::errorMessage(['error'=>'this course already paying from this user'],$message='error', $statusCode=404);



        }

        }






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showcart()
    {
        $user=Auth::guard('sanctum')->user();


        $isCartItem=Cart::where('user_id',$user->id)->exists();

if ($isCartItem) {
  $cartItems=Cart::where('user_id',$user->id)->get();
  return ApiTraits::data(compact('cartItems'));

}else{

    return  ApiTraits::errorMessage(['fetch'=>'fail'],$message='user dont have items in cart', $statusCode=404);
}

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
    public function destroyItem($itemid)
    {

    $user=Auth::guard('sanctum')->user();

    $cartItems=Cart::where('user_id',$user->id)->get();

    Cart::where('id',$itemid)->delete();


    return ApiTraits::successMessage('delet successfuly');





    }

    public function destroyAll()
    {

        $user=Auth::guard('sanctum')->user();


        $cartItems=Cart::where('user_id',$user->id)->delete();


        return ApiTraits::successMessage('delet successfuly');


    }

}
