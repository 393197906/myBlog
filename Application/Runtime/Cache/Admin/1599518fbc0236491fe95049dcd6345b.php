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

	<title><?php echo ($title); ?></title>
</head>
<body>

	<div class="flex-grid">
		<div class="row">
			<div class="cell size12">
				<h3>
					添加文章<small> AddArticle</small>
					<span class="mif-plus place-right"></span>
				</h3>
				<hr class="bg-red thin"></div>
		</div>
  <form action="/myBlog/index.php/Admin/Code/doAddArticle" id="article" method="post">
		<div class="row">
			<div class="cell size12">
				<label for="">
					<h4>
						文章标题
						<small>(为您的文章填写标题)</small>
					</h4>
				</label>
				<div class="input-control text full-size ">
					<input type="text"  name="title" placeholder="填写标题"></div>
				<div class="row">
					<div class="cell size6 padding10 no-padding-top no-padding-bottom no-padding-left">
						<label for="">
							<h4>
								文章专题
								<small>(为您的文章选择专题)</small>
							</h4>
						</label>
						<div class="input-control select full-size">
							<select name="subject"  id="subject">
								<?php if(is_array($subject)): $i = 0; $__LIST__ = $subject;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["cname"]); ?>"><?php echo ($vo["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>

				</div>


				<div class="row">
					<div class="cell size12">
						<label for="">
							<h4>文章内容</h4>
						</label>
							<script id="editor" name="content" type="text/plain">
                    </script>
					</div>
				</div>
				<div class="row">
					<div class="cell size12">
						<button class="button primary full-size" type="submit" id="postarticle">保存</button>
					</div>
				</div>

				<div class="row">
					<div class="cell size12">
						<a onclick="history.go(-1)"><button class="button danger full-size">返回</button></a>
					</div>
				</div>

			</div>
		</div>

		</form>

		<div class="row">
			<div class="cell size12"></div>
		</div>
	</div>
</body>
</html>

<!-- 配置文件 -->
<script type="text/javascript" src="/myBlog/Public/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/myBlog/Public/ueditor/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script>
    $(document).ready(function(){

            var value = $("#subject").val();
            $.post("/myBlog/index.php/Admin/Content/getClass",
                    {
                        name:value
                    },
                    function(data,status){
                        $("#classname").html(data);
                    });



        $("#subject").focusout(function(){
            var value = $(this).val();
            $.post("/myBlog/index.php/Admin/Content/getClass",
                    {
                        name:value
                    },
                    function(data,status){
                        $("#classname").html(data);
                    });
        })
    });

    var ue = UE.getEditor('editor');
</script>