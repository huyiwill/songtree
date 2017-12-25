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
	
   	<script src="__PUBLIC__/kindeditor-4.1.10/kindeditor-min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="__PUBLIC__/kindeditor-4.1.10/themes/default/default.css" />	
	<script charset="utf-8" src="__PUBLIC__/kindeditor-4.1.10/lang/zh_CN.js"></script>
	<script>
		KindEditor.ready(function(K) {
				K.create('#content', {
					themeType : 'simple',
					uploadJson : '__GROUP__/Upload/ueditor',
					fileManagerJson : '__GROUP__/Upload/imageManager',
					allowFileManager : true,
					filterMode: false,
				});
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : '__GROUP__/Upload/ueditor',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#url').val(url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('自定义错误信息: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});
				});
		</script>

  </head>
  <body>
  <div class="panel panel-info">
   
	  <div class="panel-heading">内容修改</div>
	
 <div class="panel-body">

	


			 <form class="form-horizontal" action="__GROUP__/Info/edit" method="post" role="form" >
					  <div class="form-group">
						<label for="webname" class="col-sm-3 control-label">标题(name):</label>
						<div class="col-sm-4">
						  <input type="webname" class="form-control" id="name" name="name" value="<?php echo ($info["name"]); ?>" placeholder="信息标题">
						</div>
					  </div>
					  <div class="form-group">
						<label for="domain" class="col-sm-3 control-label">所属分类(cid):</label>
						<div class="col-sm-2">						
							<div class="btn-group">
							<select name="cid" class="form-control">
								 <?php if(is_array($icate)): $i = 0; $__LIST__ = $icate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($info[cid] == $vo[id]): ?>selected<?php endif; ?> ><?php echo ($vo["catename"]); ?></option>
									<?php if(is_array($vo['sub'])): $i = 0; $__LIST__ = $vo['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v2["id"]); ?>" <?php if($info[cid] == $v2[id]): ?>selected<?php endif; ?> >&nbsp;&nbsp;&nbsp;&nbsp;--<?php echo ($v2["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
							</select>
						
							</div>
						</div>
						<div class="col-sm-1">
						 <label><input type="checkbox" name="istop" id="istop" <?php if($info['istop'] == 1): ?>checked<?php endif; ?> value="1">置顶</label>						
						</div>
						<div class="col-sm-1">
						 <label><input type="checkbox" name="isrec" id="isrec" <?php if($info['isrec'] == 1): ?>checked<?php endif; ?>  value="1">推荐</label>						
						</div>
						<div class="col-sm-1">
						 <label><input type="checkbox" name="isshow" id="isshow" <?php if($info['isshow'] == 1): ?>checked<?php endif; ?> value="1" >验证</label>						
						</div>
						<div class="col-sm-1">
						 <label><input type="checkbox" name="isrev" id="isrev"  <?php if($info['isrev'] == 1): ?>checked<?php endif; ?> value="1">评论</label>						
						</div>
					  </div>
					  <div class="form-group">
					  <label for="pic" class="col-sm-3 control-label">缩略图(pic):</label>
					  <div class="col-sm-3">
					   <input type="pic" class="form-control" id="logo" name="pic" value="<?php echo ($info['pic']); ?>" placeholder="">					 

					   </div>
					   <div class="col-sm-3">
								 	<iframe src="__GROUP__/Upload" height="40"  frameborder="0" scrolling="no" ></iframe>
							</div>
					  </div>
					   <div class="form-group">
						<label for="tags" class="col-sm-3 control-label">标签(tags):</label>
						<div class="col-sm-4">
						  <input type="tags" class="form-control" id="tags" name="tags" value="<?php echo ($tags); ?>" placeholder="多个用豆号,分开">
						</div>
						<div class="col-sm-2">
						<button class="btn btn-primary" data-toggle="modal" type="button" data-target="#myModal">
						  选择已有tags
						</button>
						</div>
					  </div>
		
					 <div class="form-group">
						
						 <textarea id="content" type="text/plain" name="content" style="width:100%; height:400px;" ><?php echo ($info['content']); ?></textarea>
						
					  </div>			
					  <div class="form-group">
						<label for="infotitle" class="col-sm-3 control-label">SEO标题(title):</label>
						<div class="col-sm-4">
						 <input type="text" class="form-control input-sm" id="infotitle" name="title" value="<?php echo ($info[title]); ?>" placeholder="SEO标题">
						</div>
					  </div>
					  <div class="form-group">
						<label for="infokey" class="col-sm-3 control-label">关键词(key):</label>
						<div class="col-sm-4">
						 <input type="text" class="form-control input-sm" id="infokey" name="key"  value="<?php echo ($info[key]); ?>" placeholder="关键词">
						</div>
					  </div>
					   <div class="form-group">
						<label for="infodesc" class="col-sm-3 control-label">描述(desc):</label>
						<div class="col-sm-4">
						<textarea  type="text" class="form-control input-sm"  rows="3" id="desc" name="desc" placeholder="描述"><?php echo ($info[desc]); ?></textarea>
						</div>
					  </div>
					   <div class="form-group">
						<label for="hits" class="col-sm-3 control-label">浏览量(hits):</label>
						<div class="col-sm-4">
						 <input type="text" class="form-control input-sm" id="hits" name="hits" value="<?php echo ($info[hits]); ?>">
						</div>
					  </div>
					 
					   <div class="form-group">
						<label for="author" class="col-sm-3 control-label">作者(author):</label>
						<div class="col-sm-4">
						 <input type="text" class="form-control input-sm" id="author" name="author"  value="<?php echo ($info[author]); ?>">
						</div>
					  </div>
					  <div class="form-group">
						<label for="revs" class="col-sm-3 control-label">评论数量(revs):</label>
						<div class="col-sm-4">
						 <input type="text" class="form-control input-sm" id="revs" name="revs"  value="<?php echo ($info[revs]); ?>">
						</div>
					  </div>
					  <div class="form-group">
						<label for="time" class="col-sm-3 control-label">时间(time):</label>
						<div class="col-sm-4">
						 <input type="text" class="form-control input-sm" id="time" name="time"  value="<?php echo ($info[time]); ?>">
						</div>
					  </div>
					  <div class="form-group">
						<label for="price" class="col-sm-3 control-label">价格(price):</label>
						<div class="col-sm-4">
						 <input type="text" class="form-control input-sm" id="price" name="price"  value="<?php echo ($info[price]); ?>" >
						</div>
					  </div>
					   <div class="form-group">
						<label for="pcs" class="col-sm-3 control-label">单位(pcs):</label>
						<div class="col-sm-4">
						 <input type="text" class="form-control input-sm" id="pcs" name="pcs"  value="<?php echo ($info[pcs]); ?>" >
						 <input type="hidden" class="form-control input-sm" id="id" name="id"  value="<?php echo ($info[id]); ?>" >
						 <input type="hidden" class="form-control input-sm" id="temp" name="temp"  value="<?php echo ($info[temp]); ?>" >
						</div>
					  </div>
					   <div class="form-group">
						<label for="pcs" class="col-sm-3 control-label">显示模板(temp):</label>
						<div class="col-sm-4">
						
						 <input type="text" class="form-control input-sm" id="temp" name="temp"  value="<?php echo ($info[temp]); ?>" >
						</div>
					  </div>
					  
					  <?php if(is_array($diy)): $i = 0; $__LIST__ = $diy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="form-group" id="ziduan">
						<label for="pcs" class="col-sm-3 control-label">字&nbsp;段&nbsp;名(diy):</label>
						
						<div class="col-sm-2" >
							<input type="text" name="diykey[]" value="<?php echo ($v['diykey']); ?>"/>		
						</div>
						<label for="pcs" class="col-sm-2 control-label">字&nbsp;段&nbsp;值(value):</label>
						<div class="col-sm-2" >
							<input type="text" name="value[]" value="<?php echo ($v['value']); ?>" />		
						</div>	
						<div class="col-sm-2" >
							<a href="__GROUP__/Info/delete/id/<?php echo ($v["id"]); ?>" />删除</a>	
						</div>							
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<div id="jai"></div>	  
					  	
					
					  
					
				
				
				
					  
					 
	
	   		 

	
	
	 <div class="form-group">
						<div class="col-sm-offset-3 col-sm-4">
						  <button type="submit" class="btn btn-default  btn-lg" id="post">提交</button>
						  <button type="button" id="clon" class="btn btn-primary btn-lg">加一条自定义</button>	
						</div>
	 </div>
	</form>
	
		
		   </div>
		  
				
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">TAGS列表</h4>
      </div>
      <div class="modal-body">
			<?php if(is_array($taglist)): $i = 0; $__LIST__ = $taglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label><input type="checkbox" name="taglist" id="taglist" value="<?php echo ($vo["tag"]); ?>" /><?php echo ($vo["tag"]); ?> </label><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary" id="tagtrue">确定选择</button>
      </div>
    </div>
  </div>
</div>
	
</div>
<script>
	$("#tagtrue").click(function(){
		 s='';
		y=$('input[name="tags"]').val();
		  $('input[name="taglist"]:checked').each(function(){ 
			s+=$(this).val()+','+y; 
		  });
			$("#tags").val(s);
			$('#myModal').modal('hide');
	});
		$("#clon").click(function(){
$("#jai").append('<div class="form-group" id="ziduan"><label for="pcs" class="col-sm-3 control-label">字&nbsp;段&nbsp;名(diy):</label>						<div class="col-sm-2" >							<input type="text" name="diykey[]" />							</div>						<label for="pcs" class="col-sm-2 control-label">字&nbsp;段&nbsp;值(value):</label>						<div class="col-sm-2" >							<input type="text" name="value[]" />							</div>						</div>');
		});
	</script>

  </body>
</html>