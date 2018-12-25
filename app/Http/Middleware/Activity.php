<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/9/21
 * Time: 10:53
 */

namespace App\Http\Middleware;
use Closure;

class Activity{


    //前置
    //新建一个中间件
    /*public function handle($request,Closure $next){
        if(time()<strtotime('2018-09-22')){
            return redirect('activity');
        }
        return $next($request);

    } */


    public function handle($request,Closure $next){
        $result =  $next($request);
        echo ($result);

        echo '我是后置操作';
    }








}