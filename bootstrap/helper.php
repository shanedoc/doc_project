<?php
/**
 * Created by PhpStorm.
 * User: xuke
 * Date: 2018/12/25
 * Time: 10:59
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
