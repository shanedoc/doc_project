<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/9/18
 * Time: 13:23
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{

    public static function getMember(){
        return 'member-model';

    }
}