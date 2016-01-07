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
<script src='/myblog/Public/js/stickUp.min.js'></script>
<style type="text/css">
	body{
		background: url(/myblog/Public/images/bg.jpg);
	}
</style>
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
	<nav class="navbar  navbar-default">
            <div class="container" style="background-color:white;">
               <div class="navbar-header" id="left">
                    <img src="/myblog/Public/images/shanzhijing.png"  class="img-circle" alt="Responsive image" style="max-height:50px;float:left">
                    <a class="navbar-brand active" href="/myblog/index.php/Home/Index" style="padding-left: 2rem;">DaWenxi
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="position: relative;">
                   <img src="/myblog/Public/images/shanzhiright.gif"  class="img-circle zou" alt="Responsive image" style="max-height:50px;">
                    <ul class="nav navbar-nav navbar-right" id="right">
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
                        <form class="navbar-form navbar-left" role="search" action="/myblog/index.php/Home/Code/search" method='post'>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="搜索" name="search" value=<?php echo ($_POST['search']); ?>>
                        </div>
                        <button type="submit" class="btn btn-default">搜索</button>
                    </form>
                    </ul>
                    
                   <!-- <ul class="nav navbar-nav navbar-right" style="margin-right: -30px;">
                        <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="搜索">
                        </div>
                        <button type="submit" class="btn btn-default">搜索</button>
                    </form>
                    </ul> -->
                    </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
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
    , 200)*/
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
    , 200)
</script>
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

				<div class="panel panel-default">
					<div class="panel-body">
						<h2><?php echo ($article["title"]); ?></h2>
						<div>
							<?php echo (date('Y-m-d H:i:s',$article["posttime"])); ?> by
							<a href="#"><?php echo ($article["author"]); ?></a>
							<ul class="list-inline pull-right nano">
								<li> <i class="fa fa-weibo fa-1x"></i>
								</li>
								<li> <i class="fa fa-weixin fa-1x"></i>
								</li>
								<li>
									<i class="fa fa-eye fa-1x"></i>
									<?php echo ($article["view"]); ?>
								</li>
								<li id="rise">
									<i class="fa fa-thumbs-up fa-1x"></i>
									<?php echo ($article["rise"]); ?>
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
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3>
								评论列表
								<small>comment list</small>
							</h3>
							<hr>
							<?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><div class="row commentList">
									<div class="col-md-2 text-center center-block">
										<input type="hidden" name='uid' value=<?php echo ($comment["uid"]); ?>>
										<img src="/myblog/Public/images/<?php echo ($comment["logo"]); ?>" class="youke" alt="Responsive image">
										<p><?php echo ($comment["pickname"]); ?></p>
									</div>
									<div class="col-md-8" style="padding-top:10px;">
										<p><?php echo ($comment["content"]); ?></p>
										<p class="posttime"><?php echo (date("Y-m-d H:i:s",$comment["posttime"])); ?></p>
									</div>
									<div class="col-md-2 text-center" style="padding-top:10px;">
										<a href="#" class="hf">回复</a>
									</div>
									<div class="col-md-10 col-md-offset-2">
										<?php if(is_array($comment["child"])): $i = 0; $__LIST__ = $comment["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment2): $mod = ($i % 2 );++$i;?><hr>
											<div class="row">
												<div class="col-md-2 text-center center-block">
													<input type="hidden" name='uid' value=<?php echo ($comment2["uid"]); ?>>
													<img src="/myblog/Public/images/<?php echo ($comment2["logo"]); ?>" class="youke" alt="Responsive image">
													<p><?php echo ($comment2["pickname"]); ?></p>
												</div>
												<div class="col-md-7" style="padding-top:10px;">
													<p>
													<?php if($comment2[uid]!=$comment2[touid]){ ?>
													回复 <?php echo ($comment2["touserpickname"]); ?> : 
													<?php } ?>
													<?php echo ($comment2["content"]); ?>
													</p>
													<p class="posttime"><?php echo (date("Y-m-d H:i:s",$comment2["posttime"])); ?></p>
												</div>
												<div class="col-md-3 text-center" style="padding-top:10px;">
													<a href="#" class="hf">回复</a>
												</div>
											</div><?php endforeach; endif; else: echo "" ;endif; ?>
									</div>
								</div>
								<!-- 回复模块 -->
								<div class="row area" style="display:none;">
									<div class="col-md-2"></div>
									<div class="col-md-10">
										<textarea class="form-control area" rows="3" name="content"></textarea>
										<br>
										<input type="hidden" name='uuid'> <!--不初始化-->
										<input type="hidden" name='id' value=<?php echo ($comment["id"]); ?>>
										<button class="btn btn-danger  pull-right huifu2" data-loading-text="正在提交...">回复</button>
										<button type="button" class="btn btn-link pull-right cancel">取消</button>
									</div>
								</div>

								<hr><?php endforeach; endif; else: echo "" ;endif; ?>

								<script type="text/javascript">
									$(document).ready(function() {
										$('.huifu2').click(function(){
											var $btn = $(this).button('loading');
											var uid ="<?php echo (session('id')); ?>";
											var content = $(this).siblings(".area").val();
											content = $.trim(content.replace(/回复\s.+\s:/,''));
											if(content ==''){
												warning("评论内容不能为空",'error');
												$btn.button('reset')
												return ;
											}
											var pid =  $(this).siblings("input[name='id']").val();
											var touid  = $(this).siblings("input[name='uuid']").val();

											$.post('/myblog/index.php/Home/Code/comment2',
											 {
											 	content:content,
											 	uid:uid,
											 	pid:pid,
											 	touid:touid
											 }, 
											 function(data) {
											 	if(data['status']==1){
											 		warning(data['info'],'success');
											 		window.history.go(0);
											 	}else{
											 		warning(data['info'],'error');
											 		$btn.button('reset')
											 	}
											});
										})
									});
								</script>

						</div>
					</div>
				</div>
			</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3>
							我要评论
							<small>comment list</small>
						</h3>
						<hr>
						<div class="row">
							<div class="col-md-2 text-center center-block" style="padding-top: 1rem;">
								<img src="/myblog/Public/images/bg.jpg" class="youke" alt="Responsive image">
								<p>游客</p>
							</div>
							<div class="col-md-10">
								<textarea class="form-control area" rows="4" name="content"></textarea>
								<br>
								<button class="btn btn-danger pull-right huifu1" data-loading-text="正在提交...">提交</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<!--<div class="sidebar-module sidebar-module-inset">
		<h4>关于</h4>
		<p>犯得上发射点犯得上发射点防守方的说法是发射点发射点</p>
	</div>
	-->
	<div class="panel panel-default">
		<div class="panel-body">
			<div>
				<h4>推荐</h4>
				<ol class="list-unstyled">
					<?php if(is_array($recommend)): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="">
							<li><?php echo (subtext($vo["title"],20)); ?></li>
						</a><?php endforeach; endif; else: echo "" ;endif; ?>
				</ol>
			</div>
			<div>
				<hr>
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

</div>

</div>
<hr>
<div class="row">
                <div class="col-md-12" style="padding:0;">
                    <footer>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <p>© Design 2016</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <p>Author:  达文西</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
</div>
<!-- 模态框 -->
		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="success">
			<div class="modal-dialog modal-sm">
				<div class="modal-content text-center" style="color:#d9534f">
					<h3><i class="fa fa-hand-peace-o"></i></h3>
					<hr>
					<p class="wContent"></p>
					<hr>
				</div>
			</div>
		</div>

		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="error">
			<div class="modal-dialog modal-sm">
				<div class="modal-content text-center" style="color:red">
					<h3><i class="fa fa-warning"></i></h3>
					<hr>
					<p class="wContent"></p>
					<hr>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			function warning(info,status){
				if(status=='success'){
					var mod = $('#success');
				}else{
					var mod = $('#error');
				}
				mod.find(".wContent").text(info);	
				mod.modal(
					{
						keyboard:true
					}
				);
			}
		</script>
		<!-- 模态框结束 -->
</body>
</html>
<script type="text/javascript">
	$(document).ready(function() {
		//点赞
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
					$('#rise').text("<i class=\"fa fa-thumbs-up fa-1x\"></i>"+num).css({"color":"red"});

				}else{
					warning(data['info'],'error');
				}
			});
		})

		//回复栏显示
		$('.hf').click(function(e){
			e.preventDefault();
			var area = $(this).parents(".commentList").next();
			area.css({"display":"block"});
			area.siblings('.area').css({"display":"none"}); //通报元素隐藏
			var username = $(this).parent().siblings().eq(0).text();  //用户名
			var uid = $(this).parent().siblings().eq(0).find('input[name=\'uid\']').val();  //uid
			username = $.trim(username);
			var areatext = area.find(".area");
			area.find('input[name="uuid"]').val(uid); //传过去
			areatext.text("回复 "+username+" : ");

		});

		//回复栏隐藏
		$(".cancel").click(function(e){
			e.preventDefault();
			$(this).parent().parent().css({"display":'none'});
		})

		//回复1
		$('.huifu1').click(function(){
			var $btn = $(this).button('loading')
    		//$btn.button('reset')
			var content = $("textarea[name='content']").val();
			if(content===''){
				warning("评论内容不能为空",'error');
				$btn.button('reset')
				return ;
			}
			var ofid = "<?php echo ($_GET['id']); ?>";
			var uid = "<?php echo (session('id')); ?>";
			$.post('/myblog/index.php/Home/Code/comment',
				 {
				 	content:content,
				 	ofid:ofid,
				 	uid:uid
				 }, 
				 function(data) {
				 	if(data['status']==1){
				 		warning(data['info'],'success');
				 		window.history.go(0);
				 	}else{
				 		warning(data['info'],'error');
				 		$btn.button('reset')
				 	}
			});
		})

	});
</script>