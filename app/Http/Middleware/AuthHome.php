<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/12/24
 * Time: 10:47
 */

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthHome
{
    public function handle($request,Closure $next){
        if(!Auth::check()){
            return response('Unauthorized.', 419);
        }
        return $next($request);
    }

}