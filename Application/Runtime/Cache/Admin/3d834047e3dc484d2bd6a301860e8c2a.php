<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
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

	<title><?php echo ($subject["ename"]); ?></title>
</head>
<body>
	<div class="flex-grid">
		<div class="row">
			<div class="cell size12">
				<h3>
					<?php echo ($subject["cname"]); ?> <small><?php echo ($subject["ename"]); ?></small>
					<span class="mif-list place-right"></span>
				</h3>
				<hr class="bg-grayLighter thin"></div>
		</div>
		<a href="/myBlog/index.php/Admin/Code/addArticle?id=<?php echo ($_GET['id']); ?>">
			<button class="button danger full-size">
				<span class="mif-plus"></span>
				添加文章
			</button>
		</a>

		<div class="row">
			<div class="cell size12">
				<table class="table sortable-markers-on-left align-center border bordered hovered">
					<thead>
						<tr>
							<th class="sortable-column sort-desc" style="width:5%;">ID</th>
							<th class="sortable-column" style="width:27%;">标题</th>
							<th class="sortable-column" style="width:14%;">作者</th>
							<th class="sortable-column" style="width:14%;">阅读量</th>
							<th class="sortable-column" style="width:15%;">发表时间</th>
							<th class="sortable-column" style="width:25%;">操作</th>

						</tr>
					</thead>
					<tbody>

						<?php if(is_array($dataList)): $i = 0; $__LIST__ = $dataList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($vo["id"]); ?></td>
								<td><?php echo ($vo["title"]); ?></td>
								<td><?php echo ($vo["author"]); ?></td>
								<td><?php echo ($vo["view"]); ?></td>
								<td><?php echo (date("Y-m-d",$vo["posttime"])); ?></td>
								<td>
									<?php if($vo['recommend'] =='1'){ ?>
									<button class="button info recommend" id='<?php echo ($vo["id"]); ?>'>已荐</button>
									<?php }else{ ?>
									<button class="button warning recommend" id='<?php echo ($vo["id"]); ?>'>推荐</button>
									<?php } ?>
									<a href="/myBlog/index.php/Home/Service/article?id=<?php echo ($vo["id"]); ?>" target="_blank">
										<button class="button primary btn">查看</button>
									</a>
									<div class="dropdown-button">
										<button class="button danger dropdown-toggle">更多</button>
										<ul class="split-content d-menu place-right" data-role="dropdown">
											<li>
												<a href="/myBlog/index.php/Admin/Content/editArticle?id=<?php echo ($vo["id"]); ?>">编辑</a>
											</li>
											<li class="delete">
												<a href="">删除</a>
											</li>
										</ul>
									</div>

								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>

					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="cell size12"><?php echo ($page); ?></div>
		</div>
	</div>

	<div data-role="dialog" id="dialog" class="padding20 dialog alert" data-close-button="true"  data-overlay-click-close="true" data-overlay="true" data-windows-style="true" style="left: 0px; right: 0px; width: auto; height: auto; visibility: visible; top: 265.5px;">
	<div class="container align-center">
		<h1 style="font-family: 'Microsoft YaHei'" id="info">
			<!-- 提示信息 -->
		</h1>
	</div>
	<span class="dialog-close-button "></span>
</div>
	
	<div class="container-fluid" style="padding:0">
		<div class="col-md-2 sidebar" style="padding: 0;max-width:240px">

			
		</div>
		<div class="col-md-10 col-md-offset-2" style="margin-top:50px;">
			<div class="col-md-12" style="height:20px;"></div>
			<?php if($_GET['cfrag']=='detial'){ ?>
			
			<?php }elseif($_GET['cfrag']=='edit'){ ?>
			
			<?php }else{ ?>
			
			<?php } ?>
		</div>
	</div>
</body>
</html>
<script>
	$(document).ready(function() {
		  var title = $('title').text();
		  console.log(title);
		  $('#'+title, window.parent.document).addClass('active').siblings().removeClass('active');
 	
         //recommend
		$('.recommend').click(function(){
			var id = $(this).attr('id');
			$.post('/myBlog/index.php/Admin/Content/doRecommendArticle', {id:id}, function(data) {
				$("#info").text(data['info'][0]);
				var dialog = $("#dialog").data('dialog');
				dialog.open();
				if(data['status']==1){
					if(data['info'][1]=='1'){
						$("#"+id).removeClass('warning').addClass('info').text("已荐");
					}else{
						$("#"+id).removeClass('info').addClass('warning').text("推荐");
					}
				}
			});
		})

		//delete
		$(".delete").click(function(event) {
			event.preventDefault();
			var id = $(this).parent().parent().siblings().eq(0).attr('id');
			$.post('/myBlog/index.php/Admin/Content/doDelArticle', {id:id}, function(data) {
				getDialog(data['info']);
                        if(data['status']==1){
	                        setTimeout(function(){
                            	history.go(0)
                            }, 1000);
	                    }
				});
		});
		
	});
	
</script>