<?php
namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Traits\ApiTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChickAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $token=$request->header('Authorization');
        $userAuth=Auth::guard('sanctum')->user();
        $user=User::find($userAuth->id);

        if ($user->type=='admin') {
            return $next($request);
        }else {
            return ApiTraits::errorMessage(['Unauthorized '=>'only admin can go'], $message='must be admin',401);
        }






    }
}
