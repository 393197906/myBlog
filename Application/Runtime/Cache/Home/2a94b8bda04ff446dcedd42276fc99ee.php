<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>DaWenXi</title>
<meta charset="UTF-8">
<meta property="wb:webmaster" content="5d5adf033883cbcc" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="/myblog/Public/css/bootstrap.min.css">
<link rel="stylesheet" href="/myblog/Public/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/myblog/Public/css/font-awesome.min.css">
<link rel="stylesheet" href="/myblog/Public/css/blog.css">
<script src='/myblog/Public/js/jquery-2.1.4.min.js'></script>
<script src='/myblog/Public/js/bootstrap.min.js'></script>
<script src='/myblog/Public/js/jquery.pin.min.js'></script>
<style type="text/css">
	body{
		background: url(/myblog/Public/images/bg.jpg);
		background-attachment:fixed;
	}
</style>
</head>
<body>
    <nav class="navbar  navbar-default">
    <div class="container" style="background-color:white;">
        <div class="navbar-header" id="left">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> 
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="/myblog/Public/images/shanzhijing.png"  class="img-circle" alt="Responsive image" style="max-height:50px;float:left">
            <a class="navbar-brand " href="/myblog" style="padding-left:2rem">DaWenxi</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" id="right">
                <li>
                    <a href="<?php echo U(PATH.'/1');?>">
                        编码
                        <span class="sr-only"></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo U(PATH.'/2');?>">娱乐</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        暴雪
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo U(PATH.'/3');?>">魔兽世界</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="<?php echo U(PATH.'/4');?>">暗黑3</a>
                        </li>
                    </ul>
                </li>
                <form class="navbar-form navbar-left" role="search" action="<?php echo U(PATH.'/search');?>" method='get'>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="搜索" name="search" value=<?php echo ($_GET['search']); ?>></div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
            </ul>

            <!-- <ul class="nav navbar-nav navbar-right" style="margin-right: -30px;">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="搜索"></div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
        </ul>
        -->
    </div>
    <!-- /.navbar-collapse -->
</div>
<!-- /.container-fluid -->
</nav>
<script type="text/javascript">
    // var width = window.screen.availWidth;
    // 右-左
    /*var left = parseInt($("#left").css("width"));
    var right = parseInt($("#right").css("width"));
    var width = parseInt($("#bs-example-navbar-collapse-1").css("width"));
    width = width-left-80; //计算可行走距离
    $('.zou').css({"right":right+'px'});  //初始化位置
    setInterval(function(){
        var bu = parseInt($('.zou').css('right')); 
        if(bu>=width){
            bu=right;
        }
        bu=bu+15; 
        $('.zou').css({"right":bu+'px'}); 
    }
    , 200)
    // 左-右
    var left = parseInt($("#left").css("width"));
    var right = parseInt($("#right").css("width"));
    var width = parseInt($("#bs-example-navbar-collapse-1").css("width"));
    width = width-right-80; //计算可行走距离
    $('.zou').css({"left":(left+15)+'px'});  //初始化位置
    setInterval(function(){
        var bu = parseInt($('.zou').css('left')); 
        if(bu>=width){
            bu=left;
        }
        bu=bu+15; 
        $('.zou').css({"left":bu+'px'}); 
    }
    , 200)*/
</script>
    <div class="container">
        <div class="row gaga">
            <div class="col-md-3 pull left">
                <div class="thumbnail">
                    <div class="bg-logo" style="background-image: url(/myblog/Public/images/600.jpg);"></div>
                    <div class="caption text-center">
                        <img src="/myblog/Public/images/shanzhi.gif"  class="logo">
                        <h3>达文皙</h3>
                        <p>不以彼岸为目的的航行</p>
                        <p>
                            <a href="#" class="btn btn-danger" role="button">Focus</a>
                        </p>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <h4> <i class="fa fa-weibo fa-1x"></i>
                            微博
                            <small>WeiBo</small>
                        </h4>
                        <img src="/myblog/Public/images/weibo.png" alt="二维码" class="panel-img" style="width:85%;height:85%;padding-top:10px;padding-bottom: 15px;">
                        <h4> <i class="fa fa-weixin fa-1x"></i>
                            微信
                            <small>WeiXin</small>
                        </h4>
                        <img src="/myblog/Public/images/weixin.jpg" alt="二维码" class="panel-img"></div>
                </div>
            </div>
            <div class="col-md-6  center">
                 <div class="panel panel-default">
                    <div class="panel-body content" style="padding-top:0;">
                        <?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row" style="padding-top:20px;">
                                <div class="col-md-9">
                                    <a href="/myblog/Home/Code/detail?id=<?php echo ($vo["id"]); ?>"><h3 style="padding-bottom: 3px;margin-top:3px;"><?php echo (subtext(strip_tags($vo["title"]),23)); ?></h3></a>
                                    <p style="padding-bottom: 10px;"><?php echo (subtext(strip_tags(htmlspecialchars_decode($vo["content"])),120)); ?></p>
                                    <p class="p-bottom">
                                        <span class="glyphicon glyphicon-tag"></span>
                                        <?php echo ($vo["label"]); ?>
                                            <span class="glyphicon glyphicon-thumbs-up" style="margin-left: 20px;"></span>
                                            <?php echo ($vo["rise"]); ?>
                                        <span style="margin-left: 20px;">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                            <?php echo ($vo["view"]); ?>
                                        </span>
                                        <span style="margin-left: 20px;">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                            <?php echo (date("Y/m/d",$vo["posttime"])); ?>
                                        </span>
                                        
                                        <a href="/myblog/Home/Code/detail?id=<?php echo ($vo["id"]); ?>" style="float:right;text-decoration:none;">
                                            阅读全文
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <?php if(empty($vo['logo'])){ ?>
                                     <img src="/myblog/Public/images/shanzhijing.png" class="img-responsive ">
                                    <?php }else{ ?>
                                    <img src="<?php echo ($vo["logo"]); ?>" class="img-responsive ">
                                     <?php } ?>
                                </div>
                            </div>

                            <hr class="hr-bottom"><?php endforeach; endif; else: echo "" ;endif; ?>
                        <div class="row" id='wb' style="display:none;">
                        <div class="col-md-12 text-center">
                        <p class="load">已全部加载</p>
                        </div>
                        </div>
                    </div>
                    <!-- 加载模块 -->
                    <div class="row" id="loadIndex" style="display:block">
                        <div class="col-md-12 text-center">
                          <i class="fa fa-spinner fa-pulse fa-2x fa-fw margin-bottom"></i>
                        </div>
                    </div>
                    <script type="text/javascript">
                                $(document).ready(function() {
                                    $(window).scroll(function(){
                                        if(window.scrollY>=$(document).height()-$(window).height()&&$('#wb').is(function(){
                                            if( $(this).css('display') == 'none'){
                                                return true;
                                            }else{
                                                return false;
                                            }
                                        })){ //到底
                                             var firstRow  = $('.content').children().size()-1;
                                             firstRow  = parseInt(firstRow/2); //计算起始主键
                                             console.log(firstRow);
                                             var load = $('#loadIndex');
                                            $.post('/myblog/Home/Index/pageList', {firstRow:firstRow}, function(data) {
                                                if(data['status']==1){
                                                         var obj = $('.content').children().last().prev(); //追加对象
                                                         obj.after(data['info']);
                                                }else{
                                                    if(data['info']=='complate'){
                                                        load.css({'display':'none'}); //加载隐藏
                                                        $('#wb').css({'display':'block'})
                                                    }else{
                                                        warning(data['info'],'error'); 
                                                    }
                                                }
                                            }); 
                                        }
                                    })

                                });
                            </script>
                </div>
            </div>
            <div class="col-md-3 pull right">
                <div class="panel panel-default">
                    <div class="panel-heading pannel-title">
                        <i class="fa fa-code"></i>
                        编码
                    </div>
                    <div class="panel-body labelh " style="line-height:30px;">
                        <?php if(is_array($code)): $i = 0; $__LIST__ = $code;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/myblog/Home/Code/index?id=<?php echo ($vo["id"]); ?>"><span class="label label-default"><?php echo ($vo["cname"]); ?></span></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading pannel-title">
                        <i class="fa fa-toggle-right"></i>
                        娱乐
                    </div>
                    <div class="panel-body labelh " style="line-height:30px;">
                        <?php if(is_array($fun)): $i = 0; $__LIST__ = $fun;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/myblog/Home/Code/index?id=<?php echo ($vo["id"]); ?>"><span class="label label-default"><?php echo ($vo["cname"]); ?></span></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading pannel-title">
                        <i class="fa fa-bitcoin"></i>
                        暴雪
                    </div>
                    <div class="panel-body labelh " style="line-height:30px;">
                        <?php if(is_array($bx)): $i = 0; $__LIST__ = $bx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/myblog/Home/Code/index?id=<?php echo ($vo["id"]); ?>"><span class="label label-default"><?php echo ($vo["cname"]); ?></span></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <hr>

        <div class="row">
                <div class="col-md-12" style="padding:0;">
                    <footer>
                        <!-- <div class="row"> 
                            <div class="col-md-6 text-left">
                                <p>© Design 2016</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Author:  达文西</p>
                            </div>
                        </div>-->
                        <div class="row"> 
                            <div class="col-md-12">
                                <p style="padding-top: 10px;"><span class="pull-left">© Design 2016</span>
                                <span class="pull-right">Author:  达文西</span></p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
         <div id="top" style="width:100px;height:50px;position:fixed;bottom:65px;display: none;">
	<button class="btn btn-default"><i class="fa fa-space-shuttle fa-2x fa-rotate-270"></i></button>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var width = $(window).width();
		console.log(width);
		var kyWidth = $('.container').width();
		width = parseInt(width-kyWidth)/2;
		$('#top').css({"right":width+"px"});  //控制距离

		$(window).scroll(function(event) {
			 var height = window.scrollY;
			 if(height>=400){
			 	$('#top').css({"display":"block"});
			 }else{
			 	$('#top').css({"display":"none"});
			 }
		});
		//点击事件
		$('#top').click(function(event) {
			window.scrollTo(0,0);

			/*TODO 动画效果*/
		});

	});
</script>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('.labelh span').hover(function(){
           $(this).removeClass('label-default');
            $(this).addClass('label-danger');
        },function(){
            $(this).removeClass('label-danger');
            $(this).addClass('label-default');
        })

        $('.pull').stickUp();
    });
</script>