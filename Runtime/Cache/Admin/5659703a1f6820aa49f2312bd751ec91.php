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
   
	  <div class="panel-heading">程序版本信息</div>
	
	    <div class="panel-body">
		    <div class="alert alert-warning alert-dismissable hidden" id="tishi">
		
			</div>
	<!-- Nav tabs -->
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#home" data-toggle="tab">配置数据库</a></li>
		  
		</ul>

<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane active" id="home">
		  <div class="panel-body">
		  	 <form class="form-horizontal" action="__GROUP__/Index/mysqlset" method="post" role="form">
					<div class="form-group">
						<label for="DB_TYPE" class="col-sm-3 control-label">数据库类型(DB_TYPE):</label>
						<div class="col-sm-4">
						  <input type="DB_TYPE" class="form-control" id="DB_TYPE" name="DB_TYPE" value="<?php echo (C("DB_TYPE")); ?>"  placeholder="mysql">
						</div>
					</div>
					<div class="form-group">
						<label for="DB_HOST" class="col-sm-3 control-label">主机名(DB_HOST):</label>
						<div class="col-sm-4">
						  <input type="DB_HOST" class="form-control" id="DB_HOST" name="DB_HOST" value="<?php echo (C("DB_HOST")); ?>" placeholder="127.0.0.1">
						</div>
					</div>
						<div class="form-group">
						<label for="DB_PORT" class="col-sm-3 control-label">端口号(DB_PORT):</label>
						<div class="col-sm-4">
						  <input type="DB_PORT" class="form-control" id="DB_PORT" name="DB_PORT" value="<?php echo (C("DB_PORT")); ?>" placeholder="3306">
						</div>
					</div>
						<div class="form-group">
						<label for="DB_NAME" class="col-sm-3 control-label">数据库名(DB_NAME):</label>
						<div class="col-sm-4">
						  <input type="DB_NAME" class="form-control" id="DB_NAME" name="DB_NAME" value="<?php echo (C("DB_NAME")); ?>" placeholder="数据库名">
						</div>
					</div>
						<div class="form-group">
						<label for="DB_USER" class="col-sm-3 control-label">数据库用户名(DB_USER):</label>
						<div class="col-sm-4">
						  <input type="DB_USER" class="form-control" id="DB_USER" name="DB_USER" value="<?php echo (C("DB_USER")); ?>" placeholder="数据库用户名">
						</div>
					</div>
						<div class="form-group">
						<label for="DB_PWD" class="col-sm-3 control-label">数据库密码(DB_PWD):</label>
						<div class="col-sm-4">
						  <input type="DB_PWD" class="form-control" id="DB_PWD" name="DB_PWD" value="<?php echo (C("DB_PWD")); ?>" placeholder="数据库密码">
						  <input type="hidden"  name="DB_PREFIX" id="DB_PREFIX" value="<?php echo (C("DB_PREFIX")); ?>" />
						</div>
					</div>
					
					<div class="form-group">
						<label for="webuser" class="col-sm-3 control-label">超级管理员账号(webuser):</label>
						<div class="col-sm-4">
						  <input type="webuser" class="form-control" id="webuser" name="webuser" value="<?php echo (C("webuser")); ?>"  placeholder="PCWAP">
						</div>
					</div>
					<div class="form-group">
						<label for="webuserpass" class="col-sm-3 control-label">超级管理员密码(webuserpass):</label>
						<div class="col-sm-4">
						  <input type="password" class="form-control" id="webuserpass" name="webuserpass" value="<?php echo (C("webuserpass")); ?>" placeholder="PCWAP">
						</div>
					</div>
				
			 </div>
		   
		   <div class="form-group">
						<div class="col-sm-offset-3 col-sm-4">
						  <button type="submit" class="btn btn-default" id="post">提交</button>
						</div>
					  </div>
		  </div>
		  
		
		
		
					</form>
		</div>
			
		</div>
 </div>
 


  </body>
</html>