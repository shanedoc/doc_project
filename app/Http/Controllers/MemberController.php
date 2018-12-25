<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/9/18
 * Time: 12:52
 */
namespace App\Http\Controllers;


use App\Member;

class MemberController extends Controller {
    public function info(){
        //输出模板
        //输出变量
        /*return view('member/info',[
            'name' =>'xuke',
            'age' => '25',
            'sex' => 'female',
        ]);*/
        //调用模型静态方法
        return Member::getMember();
    }



}