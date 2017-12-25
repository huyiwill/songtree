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
   
	  <div class="panel-heading">分类管理</div>
	
	    <div class="panel-body">
		    <div class="alert alert-warning alert-dismissable hidden" id="tishi">
		
			</div>
	<!-- Nav tabs -->
	<form action="__GROUP__/Cate/sortcate" method="post" />
	<table class="table table-bordered table-hover table-condensed">
	  <tr>
		<th>分类ID</th>
		<th>分类名</th>
		
		<th>排序</th>
		<th>分页数量</th>
		<th>类型</th>	
		<th>导航显示</th>	
		<th>操作</th>	
	
	  </tr>
	 
	  <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td class="font12"><?php echo ($vo["id"]); ?></td>
			<td class="font12"><a href="__GROUP__/Info/index/cid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></td>		
			<td class="font12"><input type="text" name="<?php echo ($vo["id"]); ?>"  value="<?php echo ($vo["sort"]); ?>" /></td>
			<td class="font12"><?php echo ($vo["catepage"]); ?></td>
			<td class="font12"><?php if($vo[catetype] == '1'): ?>新闻<?php elseif($vo['catetype'] == '2'): ?>产品<?php else: ?>单页<?php endif; ?></td>		
			<td class="font12"><?php if($vo['menu'] == '1'): ?>是<?php else: ?>否<?php endif; ?></td>		
			<td class="font12"><a href="__GROUP__/Cate/edit/id/<?php echo ($vo["id"]); ?>" class="btn btn-info btn-sm">修改</a> &nbsp; <a href="__GROUP__/Cate/delete/id/<?php echo ($vo["id"]); ?>" class="btn btn-warning btn-sm" onclick='return confirm("真的要删除?不可恢复!并且会删除该分类下的所有文章");'>删除</a></td>
	  </tr>
	
		<?php if(is_array($vo["sub"])): $i = 0; $__LIST__ = $vo["sub"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
			<td class="font12"><?php echo ($v["id"]); ?></td>
			<td class="font12"><a href="__GROUP__/Info/index/cid/<?php echo ($v["id"]); ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;----<?php echo ($v["catename"]); ?></td>		
			<td class="font12"><input type="text" name="<?php echo ($v["id"]); ?>"  value="<?php echo ($v["sort"]); ?>" /></td>
			<td class="font12"><?php echo ($vo["catepage"]); ?></td>
			<td class="font12"><?php if($v[catetype] == '1'): ?>新闻<?php elseif($v['catetype'] == '2'): ?>产品<?php else: ?>单页<?php endif; ?></td>		
			<td class="font12"><?php if($v['menu'] == '1'): ?>是<?php else: ?>否<?php endif; ?></td>	
			<td>
		 <a href="__GROUP__/Cate/edit/id/<?php echo ($v["id"]); ?>" class="btn btn-info btn-sm">修改</a> &nbsp; <a href="__GROUP__/Cate/delete/id/<?php echo ($v["id"]); ?>" class="btn btn-warning btn-sm" onclick='return confirm("真的要删除?不可恢复!并且会删除该分类下的所有文章");'>删除</a></td>
	  </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
	 
	  
	 
	</table>
	<div class="form-group">
						<div class="col-sm-offset-3 col-sm-4">
						   <button type="subimt" class="btn btn-default" id="post">排序</button>
						   <a href="__GROUP__/Cate/addcate" class="btn btn-primary">添加分类</a>
						
						</div>
					  </div>
	 </form>
	
		
		   </div>
		  
				
</div>
			




  </body>
</html>