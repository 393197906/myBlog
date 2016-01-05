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
	<style type="text/css">
	  #rise,.share:hover{
	  	color:#5e5e5e;
	  }
	  .share{
		padding-top: 30px;
		color:#b4bbbf;
		cursor: pointer;
	  }
	  .nano li{
			padding:0px 10px 0px 10px; 
			cursor:pointer;
	  }
  </style>
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
					<?php $cou = count($mianbao); for($i=$cou-1;$i>=0;$i--){ echo "
						<li>
							<a href='/myblog/index.php/Home/Code/index?id=".$mianbao[$i]['id']."'>".$mianbao[$i]['cname']."</a>
						</li>
						"; } ?>
					<li><?php echo (subtext($article["title"],30)); ?></li>
				</ol>

				<h2><?php echo ($article["title"]); ?></h2>
				<div>
					<?php echo (date('Y-m-d H:i:s',$article["posttime"])); ?> by
					<a href="#"><?php echo ($article["author"]); ?></a>
					<ul class="list-inline pull-right nano">
						<li> <i class="fa fa-weibo fa-1.5x"></i>
						</li>
						<li> <i class="fa fa-weixin fa-1.5x"></i>
						</li>
						<li>
							<i class="fa fa-eye fa-1.5x"></i> <?php echo ($article["view"]); ?>
						</li>
						<li id="rise">
							<i class="fa fa-thumbs-up fa-1.5x"></i> <?php echo ($article["rise"]); ?>
						</li>
						
					</ul>
				</div>
				<?php echo (htmlspecialchars_decode($article["content"])); ?>
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="col-md-3 col-md-offset-3 share">
							<p>
								<i class="fa fa-weibo fa-3x"></i>
							</p>
							<p>分享到微博</p>
						</div>
						<div class="col-md-3 share">
							<p>
								<i class="fa fa-weixin fa-3x"></i>
							</p>
							<p>分享到微信</p>
						</div>

						<!-- <i class="fa fa-weixin fa-3x"></i>
					-->
				</div>
				<div class="col-md-12">
					<nav>
						<ul class="pager">
							<?php if(!empty($article['fid'])){ ?>
							<li>
								<a href="/myblog/index.php/Home/Code/detail?id=<?php echo ($article["fid"]); ?>">上</a>
							</li>
							<?php } if(!empty($article['nid'])){ ?>
							<li>
								<a href="/myblog/index.php/Home/Code/detail?id=<?php echo ($article["nid"]); ?>">下</a>
							</li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<!--<div class="sidebar-module sidebar-module-inset">
			<h4>关于</h4>
			<p>犯得上发射点犯得上发射点防守方的说法是发射点发射点</p>
		</div>
		-->
		<div>
			<h4>推荐</h4>
			<ol class="list-unstyled">
				<?php if(is_array($recommend)): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="">
						<li><?php echo (subtext($vo["title"],20)); ?></li>
					</a><?php endforeach; endif; else: echo "" ;endif; ?>
			</ol>
		</div>
		<div>
			<h4>其他</h4>
			<ol class="list-unstyled">
				<li>
					<a href="#">GitHub</a>
				</li>
				<li>
					<a href="#">Twitter</a>
				</li>
				<li>
					<a href="#">Facebook</a>
				</li>
			</ol>
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
		var num = $('#rise').text();
		$('#rise').click(function(){
			var id = <?php echo ($_GET['id']); ?>;
			$.post('/myblog/index.php/Home/Code/doRise',
			 {
			 	id:id
			 },
			  function(data) {
				if(data['status']==1){
					++num;
					$('#rise').text(num).css({"color":"red"});

				}else{
					alert(data['info']);
				}
			});
		})
	});
</script>