@extends('layouts.layouts')
@section('title', '注册页')

@section('content')
<form id="form_register" method="post" class="sui-form form-horizontal" novalidate="novalidate">
    <div class="control-group">
        <label for="inputUsername" class="control-label">用户名：</label>
        <div class="controls">
            <input type="text" id="inputUsername" name="username" placeholder="用户名" data-rules="required">
        </div>
    </div>
    <div class="control-group">
        <label for="inputEmail" class="control-label">邮箱：</label>
        <div class="controls">
            <input type="text" id="inputEmail" name="email" placeholder="邮箱" data-rules="required|email">
        </div>
    </div>
    <div class="control-group">
        <label for="inputPassword" class="control-label">密码：</label>
        <div class="controls">
            <input type="password" id="inputPassword" name="password" placeholder="密码" title="密码" data-rules="required|min:6|max:12">
        </div>
    </div>
    <div class="control-group">
        <label for="inputRepassword" class="control-label">重复密码：</label>
        <div class="controls">
            <input type="password" id="inputRepassword" name="repassword" placeholder="重复密码" data-rules="required|match=password">
        </div>
    </div>
    <div class="control-group">
        <label for="sanwei" class="control-label"></label>
        <div class="controls">
            <button type="button" id="register" class="sui-btn btn-primary">立即注册</button>
        </div>
    </div>
</form>
<script>
    var registerUrl = "{{url('register')}}"
    var jumpUrl = "{{url('index')}}"
</script>
@stop