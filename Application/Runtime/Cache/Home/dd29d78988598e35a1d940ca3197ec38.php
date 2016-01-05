<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/myblog/Public/css/bootstrap.min.css">
<link rel="stylesheet" href="/myblog/Public/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/myblog/Public/css/font-awesome.min.css">
<link rel="stylesheet" href="/myblog/Public/css/blog.css">
<script src='/myblog/Public/js/jquery-2.1.4.min.js'></script>
<script src='/myblog/Public/js/bootstrap.min.js'></script>
</head>
<body>
    <nav class="navbar  navbar-default ">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand active" href="/myblog/index.php/Home/Index">
                    <span class=""></span>DaWenxi
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav ">
                        <li><a href="/myblog/index.php/Home/Code/index?id=1">编码<span class="sr-only"></span></a></li>
                        <li><a href="/myblog/index.php/Home/Code/index?id=2">娱乐</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">暴雪<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/myblog/index.php/Home/Code/index?id=3">魔兽世界</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/myblog/index.php/Home/Code/index?id=4">暗黑3</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right" style="margin-right: -30px;">
                        <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="搜索">
                        </div>
                        <button type="submit" class="btn btn-default">搜索</button>
                    </form>
                    </ul>
                    </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <ol class="breadcrumb">
                    <li>
                        <a href="/myblog/index.php/Home/Index/index">首页</a>
                    </li>
                    <?php $cou = count($mianbao); for($i=$cou-1;$i>0;$i--){ echo "
                        <li>
                            <a href='/myblog/index.php/Home/Code/index?id=".$mianbao[$i]['id']."'>".$mianbao[$i]['cname']."</a>
                        </li>
                        "; } echo "
                        <li>".$mianbao[0]['cname']."</li>
                        "; ?>
                </ol>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php if(is_array($nodeList)): $i = 0; $__LIST__ = $nodeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/myblog/index.php/Home/Code/index?id=<?php echo ($vo["id"]); ?>" style="text-decoration:none;">
                                <span class="label label-default"><?php echo ($vo["cname"]); ?></span>
                            </a>
                            &nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body" style="padding-top:0;">
                        <?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="row" style="padding-top:20px;">
                                <div class="col-md-9">
                                    <h2 style="padding-bottom: 10px;margin-top:10px;"><?php echo (subtext(strip_tags($vo["title"]),23)); ?></h2>

                                    <p style="padding-bottom: 10px;"><?php echo (subtext(strip_tags(htmlspecialchars_decode($vo["content"])),120)); ?></p>
                                    <p class="p-bottom">
                                        <span >
                                            <span class="glyphicon glyphicon-thumbs-up" style="top:3px;"></span>
                                            <span class="badge" style="background-color: #777"><?php echo ($vo["rise"]); ?></span>
                                        </span>
                                        <span style="margin-left: 20px;">
                                            <span class="glyphicon glyphicon-eye-open" style="top:3px;"></span>
                                            <span class="badge" style="background-color: #777"><?php echo ($vo["view"]); ?></span>
                                        </span>
                                        <span style="margin-left: 20px;">
                                            <span class="label label-default"><?php echo ($vo["label"]); ?></span>
                                        </span>
                                        <a href="/myblog/index.php/Home/Code/detail?id=<?php echo ($vo["id"]); ?>" style="float:right;text-decoration:none;">
                                            阅读全文
                                            <span class="glyphicon glyphicon-menu-right" style="top:3px;"></span>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <img src="/myblog/Public/images/logo.jpg" class="img-responsive ">
                                </div>
                            </div>

                            <hr class="hr-bottom"><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <?php if(is_array($recommend)): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/myblog/index.php/Home/Code/detail?id=<?php echo ($vo["id"]); ?>" class="list-group-item">
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
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <p>© Design 2015</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Author:  达文西</p>
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
        $('.list-group').children().eq(0).addClass('active');
    });
</script>