@extends('layouts.layouts')
@section('title', '登录页')

@section('content')
    <form id="form-msg" class="sui-form form-horizontal sui-validate" novalidate="novalidate">
        <div class="control-group">
            <label for="inputEmail" class="control-label">邮箱：</label>
            <div class="controls">
                <input type="text" id="inputEmail" placeholder="Email" data-rules="required|email">
            </div>
        </div>
        <div class="control-group">
            <label for="inputPassword" class="control-label">密码：</label>
            <div class="controls">
                <input type="password" id="inputPassword" placeholder="Password" data-rules="required|minlength=6|maxlength=12" title="密码">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <label data-toggle="checkbox" class="checkbox-pretty inline">
                    <input type="checkbox" name="remember-me"><span>记住我</span>
                </label>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <button type="button" id="submit" class="sui-btn btn-primary">Sign in</button>
            </div>
        </div>
    </form>
@stop

