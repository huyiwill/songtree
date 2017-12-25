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
   <script src="__PUBLIC__/kindeditor-4.1.10/kindeditor-min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="__PUBLIC__/kindeditor-4.1.10/themes/default/default.css" />	
	<script charset="utf-8" src="__PUBLIC__/kindeditor-4.1.10/lang/zh_CN.js"></script>
	<script>
		KindEditor.ready(function(K) {
				K.create('#content', {
					themeType : 'simple',
					uploadJson : '__GROUP__/Upload/ueditor',
					fileManagerJson : '__GROUP__/Upload/imageManager',
					allowFileManager : true
				});
				});
			
				
			
		</script>
  </head>
  <body>
  <div class="panel panel-info">
   
	  <div class="panel-heading">编辑分类</div>
	
 <div class="panel-body">
		    <div class="alert alert-warning alert-dismissable hidden" id="tishi">
		
			</div>
	<!-- Nav tabs -->
	
	<ul class="nav nav-tabs">		 
		  <li class="active"><a href="#home" data-toggle="tab">基本信息</a></li>			 
		  <li ><a href="#profile" data-toggle="tab">附加信息</a></li>			 
		</ul>
   <form class="form-horizontal" action="__GROUP__/Cate/edit" method="post" role="form" >
	<div class="tab-content">
		<div class="tab-pane active" id="home">
		  <div class="panel-body">
		
			 
				<div class="form-group">
						<label for="leixin" class="col-sm-3 control-label">分类类型:</label>
						<div class="col-sm-4">
							<label><input type="radio" value="1" name="catetype" <?php if($cate['catetype'] == '1'): ?>checked<?php endif; ?>  id="news"/>新闻</label>
							<label><input type="radio" value="2" name="catetype" <?php if($cate['catetype'] == '2'): ?>checked<?php endif; ?> id="product" />产品</label>						
							<label><input type="radio" value="3" name="catetype" <?php if($cate['catetype'] == '3'): ?>checked<?php endif; ?> id="danye" />单页</label>						
						</div> 
				</div>
				
				<div class="form-group">
						<label for="leixin" class="col-sm-3 control-label">分类级别:</label>
						<div class="col-sm-4">
							<select name="pid"  class="form-control" >
								 <?php if($cate[pid] == 0): ?><option value="0" >--顶级分类--</option><?php endif; ?>
									<?php if(is_array($catelist)): $i = 0; $__LIST__ = $catelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['id'] != $cate['id']): ?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo['id'] == $cate[pid]): ?>selected<?php endif; ?>><?php echo ($vo["catename"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								<option value="0" >--顶级分类--</option>
							</select>					
						</div> 
				</div>
				
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">分类标题:</label>
						<div class="col-sm-4">
						  <input type="text" class="form-control input-sm" value="<?php echo ($cate["catename"]); ?>" name="catename" id="catename" placeholder="分类名称">
						  <input type="hidden" value="<?php echo ($cate["id"]); ?>" name="id" id="id" />
						</div>
				</div>
				
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">分类logo:</label>
						<div class="col-sm-3">
						 <input type="text" class="form-control input-sm" id="logo" value="<?php echo ($cate["catelogo"]); ?>" name="catelogo" placeholder="">	
						
						</div>
						 <div class="col-sm-3">
								  <iframe src="__GROUP__/Upload" height="40"  frameborder="0" scrolling="no" ></iframe>
						</div>
				</div>
				
				 <div class="form-group <?php if($cate['catetype'] != '3'): ?>hidden<?php endif; ?>" id="ner">
						
						 <textarea id="content" type="text/plain" name="content" style="width:100%; height:500px;" ><?php echo ($cate["content"]); ?></textarea>
				</div>
				
				<script>
				$("#danye").click(function(){
						
						$("#ner").removeClass("hidden");							
				});
				$("#news,#product").click(function(){
						
						$("#ner").addClass("hidden");							
				});
				</script>
			</div>
		</div>
		<div class="tab-pane" id="profile">
		  <div class="panel-body form-horizontal">				
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">链接跳转:</label>
						<div class="col-sm-4">
						 <input type="catename" class="form-control input-sm" name="outurl" value="<?php echo ($cate["outurl"]); ?>" id="outurl" placeholder="如：http://www.pcwap.cn">
						</div>
				</div>
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">分类URL:</label>
						<div class="col-sm-4">
						<input type="text" class="form-control input-sm" name="url" id="url" value="<?php echo ($cate["url"]); ?>" placeholder="默认为分类名转拼音不得使用大写字母和特殊字符">
						</div>
				</div>
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">SEO标题:</label>
						<div class="col-sm-4">
						<input type="text" class="form-control input-sm" id="catetitle" name="catetitle"  value="<?php echo ($cate["catetitle"]); ?>" placeholder="SEO标题一般不超过80个字符">
						</div>
				</div>
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">SEO关键词:</label>
						<div class="col-sm-4">
						<input type="text" class="form-control input-sm" id="catekey" name="catekey" value="<?php echo ($cate["catekey"]); ?>" placeholder="一般不超过100个字符且不能有引号">
						</div>
				</div>
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">SEO描述:</label>
						<div class="col-sm-4">
						<textarea  type="text" class="form-control input-sm"  rows="3" id="catedesc" name="catedesc" ><?php echo ($cate["catedesc"]); ?></textarea>
						</div>
				</div>
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">分类模板:</label>
						<div class="col-sm-4">
						<input type="text" class="form-control input-sm" id="catetemp" name="catetemp" value="<?php echo ($cate["catetemp"]); ?>" placeholder="默认不填为自动识别">
						</div>
				</div>
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">内容模板:</label>
						<div class="col-sm-4">
						<input type="text" class="form-control input-sm" id="infotemp" name="infotemp" value="<?php echo ($cate["infotemp"]); ?>" placeholder="默认不填为自动识别">
						</div>
				</div>
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">一页显示数量:</label>
						<div class="col-sm-4">
						<input type="text" class="form-control input-sm" id="catepage" value="<?php echo ($cate["catepage"]); ?>"  name="catepage" placeholder="一页显示数量超过开始翻页">
						</div>
				</div>
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">排序:</label>
						<div class="col-sm-4">
						<input type="text" class="form-control input-sm" id="sort" name="sort" value="<?php echo ($cate["sort"]); ?>" placeholder="100">
						</div>
				</div>
				<div class="form-group">
						<label for="title" class="col-sm-3 control-label">导航显示:</label>
						<div class="col-sm-4">
						<input type="radio" checked id="menu" name="menu" <?php if($cate['menu'] == '1'): ?>checked<?php endif; ?> value="1" >是   <input type="radio" <?php if($cate['menu'] == '0'): ?>checked<?php endif; ?> id="menu" name="menu" value="0" >否	
						</div>
				</div>
			</div>
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
			


  </body>
</html>