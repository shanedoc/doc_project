<?php
namespace App\Model;

use App\User as UserBase;

class User extends UserBase{
    protected $table = 'users';
    static $tableName = 'users';

    const USER_NORMAL_STATUS = 1;
    const USER_LOGIN_STATUS = 0;





}