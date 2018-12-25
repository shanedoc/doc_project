
@extends('layouts.layouts')
@section('title', '首页')
<form class="sui-form form-horizontal">
    <div class="control-group">
        <label for="inputEmail" class="control-label">邮箱：</label>
        <div class="controls">
            <input type="text" id="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="control-group">
        <label for="inputPassword" class="control-label">密码：</label>
        <div class="controls">
            <input type="password" id="inputPassword" placeholder="Password">
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
<script type="text/javascript">
    $('#submit').click(function(){
        alert(1);
    })

</script>