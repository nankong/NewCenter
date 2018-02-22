$(function(){
    //协议
    $('#rule').click(function () {
        layer.open({
            type: 1,
            title: false,
            closeBtn: 1,
            shadeClose: true,
            skin: 'yourclass',
            content: '以热爱祖国为荣，以危害祖国为耻；' +
            '以服务人民为荣，以背离人民为耻；' +
            '以崇尚科学为荣，以愚昧无知为耻；' +
            '以辛勤劳动为荣，以好逸恶劳为耻；' +
            '以团结互助为荣，以损人利己为耻；' +
            '以诚实守信为荣，以见利忘义为耻；' +
            '以遵纪守法为荣，以违法乱纪为耻；' +
            '以艰苦奋斗为荣，以骄奢淫逸为耻。'
        });
    });
    // 刷新验证码
    var verifyimg = $("#verfi").attr("src");
    //console.log(verifyimg);
    $("#verfi").click(function(){
        if( verifyimg.indexOf('?')>0){
            $("#verfi").attr("src", verifyimg+'&random='+Math.random());
        }else{
            $("#verfi").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });
    $('.btn_zhuce').click(function () {
        if(!$('#rules').is(":checked")){
            layer.msg('不同意协议还想注册？',{icon:3});
            return false;
        }
        var phone = $('#userPhone').val();
        if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(phone))){
            layer.msg('手机号都能输错？');
            return false;
        }
        var userName= $('#userName').val().trim();
        if(userName == ''){
            layer.msg('连名字都没有？');
            return false;
        }
        var loginPass= $('#loginPass').val().trim();
        if(loginPass == ''){
            layer.msg('密码不能为空');
            return false;
        }
        var password2 = $('#password2').val().trim();
        if(loginPass != password2){
            layer.msg('两次密码不一样，蠢货');
            return false;
        }
        var idcode = $('#idcode').val();
        $.ajax({
            url:"{:url('home/user/check')}",
            data:{
                idcode:idcode
            },
            type:'POST',
            success:function(data){
                if(data==true){
                    login();
                }else{
                    layer.msg('色盲呀，验证码都输错！',function () {
                        document.getElementById('verfi').click();
                    });
                    return false;
                }
            },
            error:function(){
                alert(1);
            }
        });

    })
});
function login(){
    var but = document.getElementById('reform');
    var data = new FormData(but);
//            查看所有
//            for (var info of data.entries()) {
//                console.log(info[0]+ ':'+ info[1]);
//            }
    // console.log(data);
    $.ajax({
        url:"{:url('home/user/register')}",
        type:'POST',
        data:data,
        dataType:'json',
        cache:false,
        processData:false,
        contentType:false,
        success:function(data){
            //console.log(data);
            layer.msg('注册对咯，弟弟,返回首页',{time:1000},function(){
                window.location.href = "{:url('home/index/index')}";
            });
            // console.log(data);
        },
        error:function(data){
            layer.msg('注册了还想注册，换个手机号',function(){
                window.location.reload();
            })
            //console.log(data);
        }
    })
}