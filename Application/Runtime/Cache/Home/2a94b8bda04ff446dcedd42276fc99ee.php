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
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="bg-logo" style="background-image: url(/myBlog/Public/images/600.jpg);"></div>
                        <div class="caption text-center">
                            <img src="/myBlog/Public/images/logo.jpg" alt="" class="logo">
                            <h3>达文西</h3>
                            <p>...</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>
                    </div>

                    <div class="panel panel-default">
                    	<div class="panel-body text-center">
                    		<h4><span class="glyphicon glyphicon-tag"></span> 微博 <small>Weixin</small></h4>
                    		<img src="/myBlog/Public/images/er.jpg" alt="二维码" class="panel-img">
                    		<h4><span class="glyphicon glyphicon-tag"></span> 微信 <small>WeiBo</small></h4>
                    		<img src="/myBlog/Public/images/er.jpg" alt="二维码" class="panel-img">
                    	</div>
                    </div>
                </div>
                <div class="col-md-6"  style="padding-left: 0;">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h1>fdsfsfsf</h1>
                            <p>fsdfsdfsfsfsdfs</p>
                            <span class="label label-default">default</span>
                            <hr class="bg-primary">
                        </div>
                        <div class="panel-body">
                            <h1>fdsfsfsf</h1>
                            <p>fsdfsdfsfsfsdfs</p>
                            <hr class="bg-danger">
                        </div>
                    </div>
                </div>
                <div class="col-md-3"  style="padding-left: 0;">
                    <div class="panel panel-default">
                        <div class="panel-heading pannel-title"><span class="glyphicon glyphicon-tag"></span> 热门标签</div>
                        <div class="panel-body" style="line-height:30px;">
                            <span class="label label-default">phpfsdfsf</span>
                            <span class="label label-default">php</span>
                            <span class="label label-default">phpfsdf</span>
                            <span class="label label-default">php</span>
                            <span class="label label-default">phfsfp</span>
                            <span class="label label-default">phfdfp</span>
                            <span class="label label-default">php</span>
                            <span class="label label-default">phfdsfp</span>
                            <span class="label label-default">phfdsp</span>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">热门标签</div>
                        <div class="panel-body" style="line-height:30px;">
                            <span class="label label-default">phpfsdfsf</span>
                            <span class="label label-default">php</span>
                            <span class="label label-default">phpfsdf</span>
                            <span class="label label-default">php</span>
                            <span class="label label-default">phfsfp</span>
                            <span class="label label-default">phfdfp</span>
                            <span class="label label-default">php</span>
                            <span class="label label-default">phfdsfp</span>
                            <span class="label label-default">phfdsp</span>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">热门标签</div>
                        <div class="panel-body" style="line-height:30px;">
                            <span class="label label-default">phpfsdfsf</span>
                            <span class="label label-default">php</span>
                            <span class="label label-default">phpfsdf</span>
                            <span class="label label-default">php</span>
                            <span class="label label-default">phfsfp</span>
                            <span class="label label-default">phfdfp</span>
                            <span class="label label-default">php</span>
                            <span class="label label-default">phfdsfp</span>
                            <span class="label label-default">phfdsp</span>

                        </div>
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