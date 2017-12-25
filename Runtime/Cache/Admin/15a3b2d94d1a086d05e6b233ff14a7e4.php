<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>DIYWAP管理系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="__PUBLIC__js/jquery.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="__PUBLIC__css/bootcss.css">
	<link rel="stylesheet" href="__PUBLIC__css/style.css">		
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="__PUBLIC__/js/html5shiv.min.js"></script>
        <script src="__PUBLIC__/js/respond.min.js"></script>
    <![endif]-->
	
	

  </head>
  <body>
  <div class="panel panel-info">
   
	  <div class="panel-heading">微信管理</div>
	
 <div class="panel-body">

 
 <ul class="nav nav-tabs">		 
		  <li class="active"><a href="#keylist" data-toggle="tab">自定义菜单</a></li>			 
		  <li ><a href="#profile" data-toggle="tab">添加自定义菜单</a></li>			 
</ul>
<div class="tab-content">
<div class="tab-pane active" id="keylist">
		  
				<div class="panel-body">
						<form  class="form-horizontal" action="__GROUP__/Weixin/setappid" method="post">
							  <div class="form-group">
								<label for="title" class="col-sm-1 control-label">APPID:</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control" id="title" name="appid" value="<?php echo ($appid["appid"]); ?>" />
								</div>
								<label for="title" class="col-sm-1 control-label">SECRET:</label>
								<div class="col-sm-2">
								  <input type="text" class="form-control"  name="secret" value="<?php echo ($appid["secret"]); ?>" />
								  <input type="hidden" class="form-control"  name="id" value="<?php echo ($appid["id"]); ?>" />
								</div>
								  <button type="submit" class="btn btn-default">设置</button>
							  </div>
							
						</form>
						
				
						<form action="__GROUP__/Weixin/sortcate" method="post">
							<table class="table table-bordered table-hover table-condensed">
								<tr>
									<th>id</th>
									<th>菜单名</th>
									<th>类型</th>														
									<th>排序</th>
									<th>操作</th>
								</tr>
								
								 <?php if(is_array($menulist)): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($voo["id"]); ?></td>
										<td><?php echo ($voo["title"]); ?></td>
										<td><?php if($voo['leixin'] == '1'): ?>关键词：<?php echo ($voo["keys"]); else: ?>链接跳转：<?php echo ($voo["url"]); endif; ?></td>																			
										<td><input type="text" name="<?php echo ($voo["id"]); ?>" value="<?php echo ($voo["sorts"]); ?>" /></td>																			
										<td> <a href="__GROUP__/Weixin/delmenu/id/<?php echo ($voo["id"]); ?>">删除</a></td>
									</tr>
									
									 <?php if(is_array($voo['sub'])): $i = 0; $__LIST__ = $voo['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($v1["id"]); ?></td>
										<td> 　　<?php echo ($v1["title"]); ?></td>
										<td><?php if($v1['leixin'] == '1'): ?>关键词：<?php echo ($v1["keys"]); else: ?>链接跳转：<?php echo ($v1["url"]); endif; ?></td>	
									<td><input type="text" name="<?php echo ($v1["id"]); ?>" value="<?php echo ($v1["sorts"]); ?>" /></td>											
										<td> <a href="__GROUP__/Weixin/delmenu/id/<?php echo ($v1["id"]); ?>">删除</a></td>
									</tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
							</table>
							<button type="submit" class="btn btn-default">排序</button>
							<a href="__ROOT__/index.php?s=/Weixin/menu" class="btn btn-primary">生成到微信公众号</a>
							</form>
				</div>		  			 
					  
					  
</div>
  <div class="tab-pane " id="profile">
  	<div class="panel-body">	
		   <form class="form-horizontal" action="__GROUP__/Weixin/menu" method="post" role="form" >
					 
					  <div class="form-group">
						<label for="title" class="col-sm-3 control-label">菜单标题():</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control" id="title" name="title" placeholder="自定义菜单不超过16个字节一个中文两个字节">
						</div>
					  </div>
					   <div class="form-group">
						<label for="leixin" class="col-sm-3 control-label">菜单级别:</label>
						<div class="col-sm-4">					
							<label><input type="radio" value="0" id="zhu" name="pid"  checked />主菜单</label>
							<label><input type="radio"  id="er" name="pid" />二级菜单</label>						
						</div> 
					  </div>
					  <div class="form-group hidden" id="shanji">
						<label for="title" class="col-sm-3 control-label">上级菜单():</label>
						<div class="col-sm-4">
						  <select name="pid"  class="form-control">	
							<option value="0">一级菜单</option>						  
							<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						  </select>
						</div>
					  </div>
					 <div class="form-group">
						<label for="leixin" class="col-sm-3 control-label">菜单类型:</label>
						<div class="col-sm-4">					
							<label><input type="radio" value="1" id="dianji" name="leixin" />内容回复</label>
							<label><input type="radio" value="0" id="link" name="leixin" checked />链接跳转</label>						
						</div> 
					  </div>
					  <div class="form-group" id="links">
						<label for="url" class="col-sm-3 control-label">跳转链接():</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control" id="url" name="url" placeholder="跳转链接">
						</div>
					  </div>
					   <div class="form-group hidden" id="keys">
						<label for="keys" class="col-sm-3 control-label">关键词():</label>
						<div class="col-sm-4">
						 <select name="keys" class="form-control">						
							<?php if(is_array($keys)): $i = 0; $__LIST__ = $keys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["key"]); ?>"><?php echo ($vo["key"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						  </select>
						 
						</div>
					  </div>
					 <div class="form-group">
						<label for="sorts" class="col-sm-3 control-label">排序():</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control" id="sorts" name="sorts" value="100" />
						</div>
					  </div>
						 <div class="form-group">
											<div class="col-sm-offset-3 col-sm-4">
											  <button type="submit" class="btn btn-default" id="post">添加</button>
											  说明：点击类型相当于用户发送了关键词
											</div>
						 </div>
				</form>
					  
				</div>
			</div>
		  
		  
		<script>
			$("#dianji").click(function(){
				$("#links").addClass("hidden");
				$("#keys").removeClass("hidden");
			
			});
			$("#link").click(function(){
				$("#links").removeClass("hidden");
				$("#keys").addClass("hidden");
			
			});
			$("#er").click(function(){
				$("#shanji").removeClass("hidden");
			});
			$("#zhu").click(function(){
				$("#shanji").addClass("hidden");
			});
		</script>
		
		  
				
</div>


  </body>
</html>