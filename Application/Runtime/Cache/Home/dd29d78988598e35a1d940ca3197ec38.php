<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
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
        <div class="row">
            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li>
                        <a href="/myblog">首页</a>
                    </li>
                    <?php $cou = count($mianbao); for($i=$cou-1;$i>0;$i--){ echo "
                        <li>
                            <a href='".U(PATH.'/'.$mianbao[$i]['id'])."'>".$mianbao[$i]['cname']."</a>
                        </li>
                        "; } echo "
                        <li>".$mianbao[0]['cname']."</li>
                        "; ?>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-body labelh ">
                        <?php if(is_array($nodeList)): $i = 0; $__LIST__ = $nodeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U(PATH.'/'.$vo['id']);?>" style="text-decoration:none;">
                                <span class="label label-default" id="node<?php echo ($vo["id"]); ?>"><?php echo ($vo["cname"]); ?></span>
                            </a>
                            &nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top:0;">
                        <?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row" style="padding-top:20px;">
                                <div class="col-md-9">
                                <a href="<?php echo U(CONTENT.'/'.$vo['id']);?>"><h3 style="padding-bottom: 3px;margin-top:3px;"><?php echo (subtext(strip_tags($vo["title"]),23)); ?></h3></a>

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
                                        
                                        <a href="<?php echo U(CONTENT.'/'.$vo['id']);?>" style="float:right;text-decoration:none;">
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
                            <?php echo ($page); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <?php if(is_array($recommend)): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U(CONTENT.'/'.$vo['id']);?>" class="list-group-item">
                            <h4 class="list-group-item-heading"><?php echo (subtext($vo["title"],15)); ?></h4>
                            <p class="list-group-item-text"><?php echo (subtext(strip_tags(htmlspecialchars_decode($vo["content"])),20)); ?></p>

                        </a><?php endforeach; endif; else: echo "" ;endif; ?>
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
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function() {
        //推荐变色
        // $('.list-group').children().eq(0).addClass('active');
         // $('.list-group').children().eq(0).css({"background-color":"#d9534f",'color':'white'});

        //label hover
         $('.labelh span').not('#node'+<?php echo ($_GET['id']); ?>).hover(function(){
           $(this).removeClass('label-default');
            $(this).addClass('label-danger');
        },function(){
            $(this).removeClass('label-danger');
            $(this).addClass('label-default');
        })

         //label chose
         $("#node"+<?php echo ($_GET['id']); ?>).removeClass("label-default").addClass("label-danger");
    });

</script>