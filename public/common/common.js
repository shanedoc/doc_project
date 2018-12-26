$(function(){
    var email = '';
    var password = '';
    var remember = '';

    $("#login").click(function(){
        $("#form-msg").validate({
            messages: {
                email: ["邮箱不能为空", "邮箱不要瞎填哦"],
                password: "密码必须是6-12位哦"
            }
        })

        email = $('#inputEmail').val();
        password = $('#inputPassword').val();
        remember = $("input[type='checkbox']").val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url:loginUrl,
            data:{'email':email,'password':password,'remember':remember},
            success:function(data){
                if(data['success']){
                    console.log(jumpUrl)
                    window.location.href = jumpUrl;
                }else{
                    alert(data['rows']);
                    return false;
                }
            }
        })

    })

    $("#register").click(function(){
        $("#form_register").validate({
            messages: {
                username:"用户名不能为空",
                email: ["邮箱不能为空", "邮箱格式不正确"],
                password: "密码必须是6-12位哦",
                repassword:"两次密码不一致，请重试",
            }
        })

        email = $("#inputEmail").val();
        username = $("#inputUsername").val();
        password = $("#inputPassword").val();

        $.ajax({
            url:registerUrl,
            type: "POST",
            dataType: "json",
            data:{'email':email,'password':password,'username':username},
            success:function(data){
                if(data['success']){
                    window.location.href = jumpUrl;
                }else{
                    alert(data['rows']);
                    return false;
                }

            }
        })


    })


})