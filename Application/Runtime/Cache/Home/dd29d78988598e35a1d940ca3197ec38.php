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
                        <li><a href="/myBlog/index.php/Home/Code">编码<span class="sr-only"></span></a></li>
                        <li><a href="#">娱乐</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">暴雪 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">魔兽世界</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">暗黑3</a></li>
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
                        <li><a href="#">首页</a></li>
                        <li class="active">编码</li>
                    </ol>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <span class="label label-default">PHP</span>
                            <a href=""><span class="label label-default">javascript</span></a>
                            <span class="label label-default">html</span>
                            <span class="label label-default">css</span>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h1>fdsfsfsf</h1>
                            <p><span class="label label-default">default</span></p>
                            <p>fsdfsdfsfsfsdfsfsdfsdfdsfs</p>
                            <p class="p-bottom">
                            <button class="btn btn-default btn-margin">赞</button>
                            <button class="btn btn-default btn-margin">浏览</button>
                            <a href="/myBlog/index.php/Home/Code/detail?id=<?php echo ($vo["id"]); ?>"><button class="btn btn-default btn-margin" style="float: right;">阅读全文</button></a></p>
                            <hr class="hr-bottom">
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