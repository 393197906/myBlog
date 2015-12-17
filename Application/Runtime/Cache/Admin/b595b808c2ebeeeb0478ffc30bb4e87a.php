<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>达文西</title>
	<link rel="stylesheet" href="/myBlog/Public/css/metro.min.css">
<link rel="stylesheet" href="/myBlog/Public/css/metro-responsive.min.css">
<link rel="stylesheet" href="/myBlog/Public/css/metro-schemes.min.css">
<link rel="stylesheet" href="/myBlog/Public/css/metro-rtl.min.css">
<link rel="stylesheet" href="/myBlog/Public/css/metro-icons.min.css">
<link rel="stylesheet" href="/myBlog/Public/css/public.css">
<script src="/myBlog/Public/js/jquery-2.1.4.min.js"></script>
<script src="/myBlog/Public/js/metro.min.js"></script>
<script src="/myBlog/Public/js/public.js"></script>
<script src="/myBlog/Public/js/procity.js"></script>
<!-- <script src="/myBlog/Public/js/validate.js"></script> -->
<!-- <script src="/myBlog/Public/js/procity.js"></script> -->

	<style>
	.main{
		height:100%;
		min-height: 100%;
		padding-top:3.1rem;
	}

	.left{
		width:20%;
		height:100%;
		min-height: 100%;
		float: left;
		overflow: hidden;
		background-color: #3d3d3d;
	}

	.right{
		width:80%;
		height:100%;
		min-height: 100%;
		float: left;
		/*padding-top: 1%;
		padding-left: 1%;
		padding-right: 1%;*/
	}
	

	
</style>
</head>
<body style="padding:0;">
	<div class="app-bar fixed-top darcula" data-role="appbar">
	<a class="app-bar-element branding" href="/myBlog/index.php/Admin/Index/index" style="font-family:'华文新魏';line-height: 3.35rem">
	DaWenXi</a>
	<span class="app-bar-divider"></span>
	<ul class="app-bar-menu">
		<li data-flexorderorigin="0" data-flexorder="1">
			<a href="/myBlog/index.php/Admin/Code/index?id=1">
				<span class="mif-user icon"></span>
				编码
			</a>
		</li>
		<li data-flexorderorigin="2" data-flexorder="2">
			<a href="/myBlog/index.php/Admin/Code/index?id=2">
				<span class="mif-lamp icon"></span>
				娱乐
			</a>
		</li>
		<li data-flexorderorigin="1" data-flexorder="3" class="active-container">
			<a href="" class="dropdown-toggle">
				<span class="mif-file-text icon"></span>
				暴雪
			</a>
			<ul class="d-menu" data-role="dropdown" style="display: none;">
				<li>
					<a href="/myBlog/index.php/Admin/Code/index?id=3">
						<span class="mif-bubble icon"></span>
						魔兽世界
					</a>
				</li>
				<li>
					<a href="/myBlog/index.php/Admin/Code/index?id=4">
						<span class="mif-list icon"></span>
						暗黑3
					</a>
				</li>
			</ul>
		</li>
		
		<li data-flexorderorigin="4" data-flexorder="5">
			<a href="" class="dropdown-toggle">
				<span class="mif-cog icon"></span>
				设置
			</a>
			<ul class="d-menu" data-role="dropdown">

				<li class="divider"></li>
				<li>
					<a href="/myBlog/index.php/Admin/Subject/index">专题管理</a>
				</li>
			</ul>
		</li>
	</ul>

	<div class="app-bar-element place-right">
		<span class="dropdown-toggle">
			<span class="mif-user"></span>
			<?php echo (subtext($_SESSION['admin']['username'],12)); ?>
		</span>
		<div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 150px">
			<!-- <h2 class="text-light">Quick settings</h2> -->
			<ul class="unstyled-list fg-dark">
				<li>
					<a href="/myBlog/index.php/Admin/Login/logout" class="fg-white fg-hover-red">退出</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="app-bar-pullbutton automatic" style="display: none;"></div>
	<div class="clearfix" style="width: 0;"></div>
	<nav class="app-bar-pullmenu hidden flexstyle-app-bar-menu" style="display: none;">
		<ul class="app-bar-pullmenubar hidden app-bar-menu"></ul>
	</nav>
</div>
	<!--导航栏-->
	<div class="main">
		<div class="left">
			<ul class="sidebar2 left-sidebar dark" style="border:0;">
    <li class="title">专题管理</li>
    <li class="list active" id="<?php echo ($vo["ename"]); ?>">
        <a href="/myBlog/index.php/Admin/Subject/subjectList" target="frame">
        <span class="mif-list icon"></span>
        专题管理
        </a>
    </li>
</ul>
			<!--左侧菜单-->
		</div>
		<div class="right">
			<iframe src="<?php echo ($url); ?>" frameborder="0" name="frame" style="width:100%;height:99%;"></iframe>
			<!--右侧框架-->
		</div>
	</div>
</body>
</html>