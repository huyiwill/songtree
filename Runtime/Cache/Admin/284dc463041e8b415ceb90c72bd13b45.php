<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>PCWAP管理系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="__PUBLIC__/css/bootcss.css">
    <link rel="stylesheet" href="__PUBLIC__/css/style.css">
	<script src="__PUBLIC__/js/jquery.min.js"></script>
    <script src="__PUBLIC__/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="__PUBLIC__/js/html5shiv.min.js"></script>
        <script src="__PUBLIC__/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="panel panel-info">
	  <div class="panel-heading">模板设置</div>
	  <div class="panel-body">
		
		 <div class="row">
		 
		  <div class="col-md-12">

		<div class="panel panel-default">
			<ul class="list-group">
			<?php if(is_array($home)): $i = 0; $__LIST__ = $home;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item"><a href="__GROUP__/Index/edittpl/url/<?php echo ($keys[0]); ?>/tem/<?php echo ($tem); ?>/file/<?php echo ($vo['file']); ?>" ><?php echo ($vo['file']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			
			</ul>
				  
				</div>
				<a href="__GROUP__/Index/tplset" class="btn btn-default" role="button">返回</a>
		  </div>
		   
	</div>
	
		   
	</div>
</div>
</div>

  </body>
  </html>