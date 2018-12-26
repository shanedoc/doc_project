<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/12/26
 * Time: 17:38
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Model\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function info(Request $request){
        $id = Auth::id;
        $user = User::find($id);
        return view('user.info')->with($user);
    }

    public function modify(Request $request){

    }

}