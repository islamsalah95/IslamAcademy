<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\web\Cart;
use Stripe\StripeClient;
use App\Traits\ApiTraits;
use App\Models\web\Paying;
use Illuminate\Http\Request;
use App\Traits\CustomHelpers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\webStore\StorecartRequest;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsenpm
     */
    public function handlePost(Request $request , $cartItemId , $amount)
    {

        $user=Auth::guard('sanctum')->user();

        $stripe = new StripeClient(env('STRIPE_SECRET'));
          $stripeToken=$stripe->tokens->create([
            'card' => [
              'number' => $request->number,
              'exp_month' =>$request->exp_month,
              'exp_year' => $request->exp_year,
              'cvc' => $request->cvc,
            ],
          ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount" => 100 * $amount,
                "currency" => "egp",
                "source" =>$stripeToken,
                "description" =>'name:'.$user->name.'******'."userid:".$user->id
        ]);


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
    public function store(Request $request)
    {
        //
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
