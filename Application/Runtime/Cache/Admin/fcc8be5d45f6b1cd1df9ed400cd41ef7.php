<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>成功提示</title>
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

</head>
<body>
    <div class="flex-grid">
        <div class="row flex-just-center">
        <div class="cell size3 align-center" style="margin-top:200px;">
             <div class="padding text-secondary">
                <ul style="list-style-type: none;">
                    <li><span class="mif-heart mif-ani-heartbeat mif-4x margin5"></span></li>
                    <li><h2><?php echo ($message); ?></h2></li>
                    <li> 页面将在
                <span id="wait"><?php echo ($waitSecond); ?></span>
                秒后跳转，或
                <br>
                <a href="<?php echo ($jumpUrl); ?>" id="href">点此直接跳转</a></li>
                </ul>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
<script>
    var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;

    var interval = setInterval(function () {
        var time = --wait.innerHTML;
        if (time <= 0) {
            location.href = href;
            clearInterval(interval);
        }
        ;
    }, 1000);

</script>