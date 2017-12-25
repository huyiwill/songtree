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
   <div class="panel-heading">微信管理</div>
	
 <div class="panel-body">
 
 <ul class="nav nav-tabs">		 
		  <li class="active"><a href="#keylist" data-toggle="tab">关键回复管理</a></li>			 
		  <li ><a href="#profile" data-toggle="tab">添加关键回复</a></li>			 
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="keylist">
				<div class="panel-body">			
						
							<table class="table table-bordered table-hover table-condensed">
								<tr>
									<th>id</th>
									<th>关键词</th>
									<th>类型</th>
									<th>回复内容</th>								
									<th>操作</th>
								</tr>
								 <?php if(is_array($huifu)): $i = 0; $__LIST__ = $huifu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><tr>
										<td><?php echo ($voo["id"]); ?></td>
										<td><?php echo ($voo["key"]); ?></td>
										<td><?php if($voo['leixin'] == '1'): ?>文本<?php else: ?>图文<?php endif; ?></td>
										<td><?php if($voo['text']): echo ($voo["text"]); else: echo ($voo["num"]); ?>条 <?php echo ($voo["catename"]); ?> 信息<?php endif; ?></td>										
										<td><a href="__GROUP__/Weixin/eidtkey/id/<?php echo ($voo["id"]); ?>">修改</a> | <a href="__GROUP__/Weixin/delkey/id/<?php echo ($voo["id"]); ?>">删除</a></td>
									</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
				</div>		  		
	</div>
  <div class="tab-pane" id="profile">
    <div class="panel-body form-horizontal">
		 
				
					<div class="form-group">
						<label for="leixin" class="col-sm-3 control-label">回复类型:</label>
						<div class="col-sm-4">
						<button  class="btn btn-primary" role="button" data-toggle="modal" data-target="#myModal">文本</button>
						<button class="btn btn-primary" role="button" data-toggle="modal" data-target="#tuwen">站内图文</button>
									
						</div> 
					  </div>
					   
						</form>
			</div>
			</div>
		  
		  
		
		
		  
				
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">文本回复</h4>
      </div>
      <div class="modal-body">
	  
      
				 <form action="__GROUP__/Weixin/key" method="post" role="form" >
						 <div class="form-group">
						<label >关键词:</label>
						
						  <input type="text" class="form-control" id="key" name="key" placeholder="用户发送该关键词回复下面设置的内容" />
						
					  </div>
						  <div class="form-group">
							<label>回复内容</label>
							<textarea class="form-control" rows="6" name="text"></textarea>
							<input type="hidden" name="leixin" value="1" />						
						  </div>		 
				   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
        <button type="submit" class="btn btn-primary">保存修改</button>
		</form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="tuwen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">图文回复</h4>
      </div>
      <div class="modal-body">
	  
       <form action="__GROUP__/Weixin/key" method="post" role="form" >
						  <div class="form-group">
						<label >关键词:</label>
						
						  <input type="text" class="form-control" id="key" name="key" placeholder="用户发送该关键词回复下面设置的内容" />
						
					  </div>
						  <div class="form-group">
							<label>分类</label>
							<select name="cid" class="form-control">
							 
							  <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							
							</select>

						  </div>
						  <div class="form-group">
							<label>数量</label>
							<select name="num" class="form-control">
							  <option value="1">1</option>
							  <option value="2">2</option>
							  <option value="3">3</option>
							  <option value="4">4</option>
							  <option value="5">5</option>
							</select>
						  </div>
						 
						  <div class="checkbox">
							<label class="radio-inline">
							  <input type="radio" name="sort" id="inlineRadio1" value="istop desc"> 置顶
							</label>
							<label class="radio-inline">
							  <input type="radio" name="sort" id="inlineRadio1" checked value="id desc"> 最新
							</label>
							<label class="radio-inline">
							  <input type="radio" name="sort" id="inlineRadio2" value="isrec desc"> 推荐
							</label>
							<label class="radio-inline">
							  <input type="radio" name="sort" id="inlineRadio3" value="hits desc"> 点击
							</label>
							<label class="radio-inline">
							  <input type="radio" name="sort" id="inlineRadio3" value="revs desc"> 热评
							</label>
							<label class="radio-inline">
							  <input type="radio" name="sort" id="inlineRadio3" value="rand()"> 随机
							</label>
						  </div>
						    <input type="hidden" name="leixin" value="2" />
						
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">返回</button>
        <button type="submit" class="btn btn-primary">保存</button>
		</form>
      </div>
    </div>
  </div>
</div>
  </body>
</html>