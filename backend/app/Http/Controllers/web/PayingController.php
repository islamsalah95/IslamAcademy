<?php

namespace App\Http\Controllers;

use App\Models\web\paying;
use App\Http\Requests\StorepayingRequest;
use App\Http\Requests\UpdatepayingRequest;

class PayingController extends Controller
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
     * @param  \App\Http\Requests\StorepayingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepayingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\web\paying  $paying
     * @return \Illuminate\Http\Response
     */
    public function show(paying $paying)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\web\paying  $paying
     * @return \Illuminate\Http\Response
     */
    public function edit(paying $paying)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepayingRequest  $request
     * @param  \App\Models\web\paying  $paying
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepayingRequest $request, paying $paying)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\web\paying  $paying
     * @return \Illuminate\Http\Response
     */
    public function destroy(paying $paying)
    {
        //
    }
}
