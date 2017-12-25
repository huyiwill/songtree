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
	  <p></p>
	  <ul class="nav nav-tabs">
		  <li class="active"><a href="#home" data-toggle="tab">模板</a></li>
		 
		</ul>
		 <div class="tab-content">
		  <div class="tab-pane active" id="home">
			<div class="panel-body">		 
				  <div class="col-md-12">
						
						<div class="row">
							<?php if(is_array($home)): $i = 0; $__LIST__ = $home;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-3 col-md-3">
								<div class="thumbnail">
								  <img  src="__ROOT__/<?php echo ($homepath); echo ($vo['file']); ?>/pic.jpg" >
								  <div class="caption">
									
									<p>
									<a href="__ROOT__/?t=<?php echo ($vo['file']); ?>" target="_blank"  class="btn btn-primary" role="button">预览</a> 
									<a href="__GROUP__/Index/opentpl/homename/<?php echo ($vo['file']); ?>" class="btn btn-default" role="button">编辑</a>
									<?php if($hmoren == $vo['file']): ?><span class="btn btn-success" role="button">当前默认</span><?php else: ?> <a href="__GROUP__/Index/tplset/homename/<?php echo ($vo['file']); ?>" class="btn btn-primary" role="button" >设置为默认</a><?php endif; ?>
									</p>
								  </div>
								</div>
							  </div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
				</div>
			</div>
	      </div>

</div>
</div>

  </body>
  </html>