<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/9/18
 * Time: 16:26
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{

    const SEX_UN = 0;
    const SEX_BOY = 10;
    const SEX_GIRL = 20;

    //指定表名
    protected $table = 'student';

    //自动维护时间戳
    public $timestamps = true;

    protected $fillable = ['name', 'sex', 'age'];


    protected function getDateFormat(){
        return time();
    }

    public function asDateTime($value)
    {
        return $value;
    }

    public function sex($nid = null){
        $arr = [
            self::SEX_UN=>'未知',
            self::SEX_BOY=>'男',
            self::SEX_GIRL=>'女',
        ];
        if($nid != null){
            return array_key_exists($nid,$arr)?$arr[$nid]:$arr[self::SEX_UN];
        }
        return $arr;
    }

}