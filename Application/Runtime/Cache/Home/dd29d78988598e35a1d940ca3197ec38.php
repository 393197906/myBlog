<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/myBlog/Public/css/blog.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar  navbar-default ">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand active" href="/myBlog/index.php/Home/Index">
                    <span class=""></span>DaWenxi
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav ">
                        <li><a href="/myBlog/index.php/Home/Code/index?id=1">编码<span class="sr-only"></span></a></li>
                        <li><a href="/myBlog/index.php/Home/Code/index?id=2">娱乐</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">暴雪<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/myBlog/index.php/Home/Code/index?id=3">魔兽世界</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/myBlog/index.php/Home/Code/index?id=4">暗黑3</a></li>
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
                        <li><a href="/myBlog/index.php/Home/Index/index">首页</a></li>
                        <?php $cou = count($mianbao); for($i=$cou-1;$i>0;$i--){ echo "<li><a href='/myBlog/index.php/Home/Code/index?id=".$mianbao[$i]['id']."'>".$mianbao[$i]['cname']."</a></li>"; } echo "<li>".$mianbao[0]['cname']."</li>"; ?>
                    </ol>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php if(is_array($nodeList)): $i = 0; $__LIST__ = $nodeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/myBlog/index.php/Home/Code/index?id=<?php echo ($vo["id"]); ?>"><span class="label label-default"><?php echo ($vo["cname"]); ?></span></a>&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <?php if(is_array($articleList)): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h1><?php echo (subtext(strip_tags($vo["title"]),23)); ?></h1>
                                <p><span class="label label-default"><?php echo ($vo["label"]); ?></span></p>
                                <p><img src="/myBlog/Public/images/600.jpg" style="max-width: 200px;"><img src="/myBlog/Public/images/logo.jpg"  style="max-width: 200px;margin-left:10px;"></p>
                                <!-- <p><?php echo (subtext(htmlspecialchars_decode($vo["content"]),50)); ?></p> -->
                                <p><?php echo (subtext(strip_tags(htmlspecialchars_decode($vo["content"])),200)); ?></p>
                                <p class="p-bottom">
                                <span ><span class="glyphicon glyphicon-thumbs-up" style="top:3px;"></span> <span class="badge" style="background-color: #777"><?php echo ($vo["rise"]); ?></span></span>
                                <span style="margin-left: 20px;">
                                <span class="glyphicon glyphicon-eye-open" style="top:3px;"></span> <span class="badge" style="background-color: #777"><?php echo ($vo["view"]); ?></span></span>
                                <a href="/myBlog/index.php/Home/Code/detail?id=<?php echo ($vo["id"]); ?>" style="float:right">阅读全文 <span class="glyphicon glyphicon-menu-right" style="top:3px;"></span></a></p>
                                <hr class="hr-bottom"><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                        <h4 class="list-group-item-heading">编码的乐趣</h4>
                        <p class="list-group-item-text">放松放松放松发士大夫十分法大师傅士大夫犯得上发射点犯得上发射点</p>
                        </a>
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