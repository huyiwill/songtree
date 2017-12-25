<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <title>PCWAP管理系统</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="__PUBLIC__/css/bootcss.css">
	<link rel="stylesheet" href="__PUBLIC__/css/style.css">		
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="__PUBLIC__/js/html5shiv.min.js"></script>
        <script src="__PUBLIC__/js/respond.min.js"></script>
    <![endif]-->
	
	

  </head>
  <body>
  <div class="panel panel-info">
   
	  <div class="panel-heading">后台管理员管理</div>
	
 <div class="panel-body">
		    <div class="alert alert-warning alert-dismissable hidden" id="tishi">
		
			</div>
	<!-- Nav tabs -->
	
	<ul class="nav nav-tabs">
		  <li ><a href="#profile" data-toggle="tab">添加管理员</a></li>
		  <li class="active"><a href="#home" data-toggle="tab">管理管理员</a></li>
		
	
		 
		</ul>

	<div class="tab-content">
		  <div class="tab-pane" id="profile">
		  <div class="panel-body">
			 <form class="form-horizontal" action="__GROUP__/Admin/index" method="post" role="form" >
					  <div class="form-group">
						<label for="user" class="col-sm-3 control-label">用户名:</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control" id="adurl" name="user" placeholder="admin">
						</div>
					  </div>
					   <div class="form-group">
						<label for="pwd" class="col-sm-3 control-label">登录密码:</label>
						<div class="col-sm-4">
						  <input type="password" class="form-control" id="logo" name="pwd"  placeholder="">
						</div>
					</div>
					   <div class="form-group">
						<label for="author" class="col-sm-3 control-label">笔名:</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control" id="author" name="author" />
						</div>
						</div>
						<div class="form-group">
						<label for="isshow" class="col-sm-3 control-label">说明:</label>
						<div class="col-sm-4">
							<p>添加的管理员除系统设置外的其它功能都可以使用！</p>
						</div> 
					

					  </div>
					 
					  
						 <div class="form-group">
											<div class="col-sm-offset-3 col-sm-4">
											  <button type="submit" class="btn btn-default" id="post">提交</button>
											</div>
						 </div>
						</form>
					  
				</div>
			</div>
		  
		  
		
		  <div class="tab-pane  active" id="home">
		    <div class="panel-body form-horizontal">
					
					 
						<table class="table table-bordered table-hover table-condensed">
							<tr>
								<th>ID</th>
								<th>用户名</th>
								<th>笔名</th>
								<th>状态</th>
								<th>操作</th>
								
							</tr>
							 <?php if(is_array($admin)): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td><?php echo ($vo["id"]); ?></td>
									<td><?php echo ($vo["user"]); ?></td>									
									<td><?php echo ($vo["author"]); ?></td>									
									<td><?php if($vo['status'] == '1'): ?>可登录<?php else: ?>不可登录<?php endif; ?></td>									
									<td><a href="__GROUP__/Admin/edit/id/<?php echo ($vo["id"]); ?>">修改</a> | <a href="__GROUP__/Admin/del/id/<?php echo ($vo["id"]); ?>">删除</a></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
			
					 <p><a href="__GROUP__/Index/mysqlset" >超级管理账号密码修改</a></p>
			</div>
	   		 

	
	
	
		
		   </div>
		  
				
</div>



  </body>
</html>