$(function(){

    $("#submit").click(function(){
        $("#form-msg").validate({
            messages: {
                email: ["邮箱不能为空", "邮箱不要瞎填哦"],
                password: "密码必须是6-12位哦"
            }
        })

        var email = $('#inputEmail').val();
        var password = $('#inputPassword').val();
        var remember = $("input[type='checkbox']").val();

        $.ajax({
            url:"{{route('login)}}",
            data:{'email':email,'password':password,'remember':remember},
            success:function(data){
                console.log(data)

            }
        })

    })
})