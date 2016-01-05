<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>后台管理系统</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/myblog/Public/css/metro.min.css">
<link rel="stylesheet" href="/myblog/Public/css/metro-responsive.min.css">
<link rel="stylesheet" href="/myblog/Public/css/metro-schemes.min.css">
<link rel="stylesheet" href="/myblog/Public/css/metro-rtl.min.css">
<link rel="stylesheet" href="/myblog/Public/css/metro-icons.min.css">
<link rel="stylesheet" href="/myblog/Public/css/public.css">
<script src="/myblog/Public/js/jquery-2.1.4.min.js"></script>
<script src="/myblog/Public/js/metro.min.js"></script>
<script src="/myblog/Public/js/public.js"></script>
<script src="/myblog/Public/js/procity.js"></script>
<!-- <script src="/myblog/Public/js/validate.js"></script> -->
<!-- <script src="/myblog/Public/js/procity.js"></script> -->

    <style>
        .login-form {
            width: 25rem;
            height: 26.35rem;
            position: fixed;
            top: 40%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>

        if (window.location.hostname !== 'localhost') {

            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script',' ','ga');

            ga('create', 'UA-58849249-3', 'auto');
            ga('send', 'pageview');

        }


        $(function(){
            var form = $(".login-form");
            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>
</head>
<body class="bg-dark">
    <div class="login-form padding20 block-shadow">
        <form method="post" action="/myblog/index.php/Admin/Login/login">
            <h1 class="text-light " style="font-family:'微软雅黑';letter-spacing: 5px ">
                DaWenXi</h1>
            <hr class="thin bg-red"/ style="margin-bottom: 20px;">
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login" style="font-family:'微软雅黑' ">用户 or 邮箱:</label>
                <input type="text" name="username" id="user_login">
                <button class="button helper-button clear">
                    <span class="mif-cross"></span>
                </button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password" style="font-family:'微软雅黑' ">密码:</label>
                <input type="password" name="password" id="user_password">
                <button class="button helper-button reveal">
                    <span class="mif-looks"></span>
                </button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_verify" style="font-family:'微软雅黑' ">验证码:</label>
                <input type="text" name="verify" id="user_verify" placeholder="点击图片刷新" style="font-family:'微软雅黑' ">
                <button class="button helper-button reveal">
                    <span class="mif-looks"></span>
                </button>
            </div>
            <br />
            <div class="form-actions">
                <img width="100%"  id = "vec" alt="验证码" src="<?php echo U('Admin/Login/verify_c',array());?>"
                 title="点击刷新"></div>
            <div class="form-actions" style="margin-top: 5px;">
                <button type="submit" class="button bg-red full-size" style="font-family:'微软雅黑';color:white; ">登陆</button>
            </div>
        </form>
    </div>

    <!-- hit.ua -->
    <a href='http://hit.ua/?x=136046' target='_blank'>
        <script language="javascript" type="text/javascript"><!--
        Cd=document;Cr="&"+Math.random();Cp="&s=1";
        Cd.cookie="b=b";if(Cd.cookie)Cp+="&c=1";
        Cp+="&t="+(new Date()).getTimezoneOffset();
        if(self!=top)Cp+="&f=1";
        //--></script>
        <script language="javascript1.1" type="text/javascript"><!--
        if(navigator.javaEnabled())Cp+="&j=1";
        //--></script>
        <script language="javascript1.2" type="text/javascript"><!--
        if(typeof(screen)!='undefined')Cp+="&w="+screen.width+"&h="+
        screen.height+"&d="+(screen.colorDepth?screen.colorDepth:screen.pixelDepth);
        //--></script>
        <script language="javascript" type="text/javascript"><!--
        Cd.write("<img src='http://c.hit.ua/hit?i=136046&g=0&x=2"+Cp+Cr+
        "&r="+escape(Cd.referrer)+"&u="+escape(window.location.href)+
        "' border='0' wi"+"dth='1' he"+"ight='1'/>");
        //--></script>
    </a>
    <!-- / hit.ua -->

</body>

</html>
<script>
    $(document).ready(function () {
        $('#login').on('click', '', function (event) {
            event.preventDefault();
            var username = $("input[name='username']").val();
            var password = $("input[name='password']").val();
            var verify = $("input[name='verify']").val();
            $.post('/myblog/index.php/Admin/Login/login', {username: username, password: password, verify:verify}, function (data) {
                if (data['status'] == 1) {
                    location.href = "/myblog/index.php/Admin/"+data['url'];
                    alert(data['info']);
                } else {
                    alert(data['info']);
                    captcha_img.click();
                }
            });
        });
        var captcha_img = $('#vec');
        var verifyimg = captcha_img.attr("src");

        captcha_img.attr('title', '点击刷新');
        captcha_img.click(function(){
            if( verifyimg.indexOf('?')>0){
                $(this).attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });
    });
</script>