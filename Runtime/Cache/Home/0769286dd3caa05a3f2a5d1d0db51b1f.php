<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

  <title>
    <?php if($seotitle): echo ($seotitle); ?>
      <?php else: ?>
      <?php echo ($title); endif; ?>
    -<?php echo ($webname); ?>
  </title>
  <meta name="keywords" content="<?php echo ($key); ?>">
  <meta name="description" content="<?php echo ($desc); ?>">
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

<script type="text/javascript">  $(function(){    $('#image').swipeSlide({      autoPlay: 3,      delay   : 0.4    });  });</script><div class="web980">  <div class="header">    <h1><a href="/www/songtree/"><?php echo ($webname); ?></a></h1>  </div>  <div id="banner" class="banner">    <div id="image" class="swipe" style="visibility: visible;">      <div class="swipe-wrap" data-id="0">        <?php $adlists=M("ads")->where(array('id'=>array(IN,array(1,2,3))))->where('isshow=1')->order("id desc")->select();foreach ($adlists as $adlist):?><div class="swipe-item">            <a href="<?php echo ($adlist['adurl']); ?>">              <img align="absmiddle" style="width: 100%;height: 500px;" src="<?php echo ($adlist['adpic']); ?>">            </a>            <div class="bottom">              <div class="title"><?php echo ($adlist['adremak']); ?></div>            </div>          </div><?php endforeach ?>      </div>    </div>    <ul id="bannerNum" class="hd"></ul>  </div>
<div class="list_left">

  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="text_list">
      <?php if($vo[pic]): ?><a href="<?php echo ($vo[url]); ?>"><img src="<?php echo ($vo["pic"]); ?>"/></a><?php endif; ?>
      <h2><a href="<?php echo ($vo[url]); ?>"><?php echo ($vo['name']); ?></a></h2>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>


  <ul class="pagination">
    <?php echo ($page); ?>
  </ul>
</div>


</div>

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