<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    const DEFAULT_JSON_CODE = 200;//默认json返回码
    const DEFAULT_ERROR_CODE  = 202; //默认错误json返回码

    public function success($rows = null){
        $msg = isset($rows['msg'])?$rows['msg']:'default';
        return response()->json(['success'=>true,'rows'=>$rows,'results'=>$this->successMsg(config('response.'.$msg))]);

    }

    function successMsg($msg){
        return ['code'=>self::DEFAULT_JSON_CODE,'msg'=>$msg];
    }

    public function error($msg){
        return response()->json(['success'=>false,'rows'=>null,'results'=>$this->errorMsg($msg)]);

    }

    public function errorMsg($err){
        return ['code'=>self::DEFAULT_ERROR_CODE,'msg'=>$err];
    }

    function geterrorMsg($arr_err){
        foreach($arr_err as $key=>$value){
            foreach($value as $k=>$v){
                if($v) {
                    $msg = $v;
                    break;
                }
            }
        }
        return $msg;
    }
}
