<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
        $langHeader= $request->hasHeader('lang');


        if (!$langHeader
        // && $langHeader !== 'ar' && $langHeader !== 'en'
         ){
            return ApiTraits::errorMessage(['lang'=>'lang key missed in header'], $message='lang key missed in header');

        }

            App::setLocale($request->hasHeader('lang'));
            return $next($request);










    }
}
