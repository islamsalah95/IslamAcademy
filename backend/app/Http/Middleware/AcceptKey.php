<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;

class AcceptKey
{
   // php artisan make:model cart  -crR  php artisan make:model web/paying --all
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
if ( $request->header('accept') !== 'application/json') {


    return ApiTraits::errorMessage(['accept'=>'missed'],$message='application/json is missed');
}



return $next($request);




    }
}
