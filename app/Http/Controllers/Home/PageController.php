<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/12/25
 * Time: 10:49
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function root(){
        return view('pages.root');
    }



}