<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title><?php echo ($webtitle); ?>--<?php echo ($webname); ?></title>
  <meta name="Keywords" content="<?php echo ($webkey); ?>"/>
  <meta name="Description" content="<?php echo ($webdesc); ?>"/>


  <!--<link rel="stylesheet" type="text/css" href="__PUBLIC__/wap/css/css.css"/>-->

  <?php if(date('w')%2 == 1): ?><link rel="stylesheet" type="text/css" href="__PUBLIC__/wap/css/css.css"/>
    <?php else: ?>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/wap/css/css1.css"/><?php endif; ?>

  <link rel="stylesheet" type="text/css" href="__PUBLIC__/wap/css/swipe.css"/>
  <script src="__PUBLIC__/wap/js/zepto.min.js" type="text/javascript" charset="utf-8"></script>
  <script src="__PUBLIC__/wap/js/swipe.js" type="text/javascript" charset="utf-8"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<script type="text/javascript">
<div class="tel">
  电话：<a href="tel:<?php echo ($tel); ?>"><?php echo ($tel); ?></a>
</div>

<div class="menu_home">
  <ul>
    <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($v1['url']); ?>"><img src="<?php echo ($v1['catelogo']); ?>"/><br/><?php echo ($v1["catename"]); ?></a></li>
      <?php if(is_array($v1[sub])): $i = 0; $__LIST__ = $v1[sub];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($v2[url]); ?>"><img src="<?php echo ($v2['catelogo']); ?>"/><br/><?php echo ($v2["catename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>

  </ul>

</div>
<div class="clear"></div>

	</div>
	<div class="clear"></div>
	<div class="nav"></div>
	<div class="footer">
		<a href="__ROOT__" >首页</a>
		<a href="tel:<?php echo ($tel); ?>" >电话</a>
		<a href="__GROUP__/lianxiwomen.html" >地址</a>
		<a href="javascript:0" onclick="window.history.back(-1);" >返回</a>
	</div>
</body>
</html>

</div>
<script type="text/javascript">
  var len = $("#banner>ul").find("li").length;
  for(var i = 0; i < len; i++){
    $("#bannerNum").append('<li></li>');
  }
  ;
  $("#bannerNum>li").eq(0).addClass("on");
  /*鼠标移过，左右按钮显示*/
  jQuery("#banner").hover(function(){
    jQuery(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.2)
  }, function(){
    jQuery(this).find(".prev,.next").fadeOut()
  });
  /*SuperSlide图片切换*/
  jQuery("#banner").slide({
    mainCell : ".pic",
    effect   : "fold",
    autoPlay : true,
    delayTime: 600,
    trigger  : "click"
  });
</script>
</body>
</html>