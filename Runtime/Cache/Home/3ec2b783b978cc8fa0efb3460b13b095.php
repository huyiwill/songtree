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

  <script src="__PUBLIC__/wap/js/jquery.js" type="text/javascript" charset="utf-8"></script>
  <script src="__PUBLIC__/wap/js/slide.js" type="text/javascript" charset="utf-8"></script>
  <script src="__PUBLIC__/wap/js/pcwap.js" type="text/javascript" charset="utf-8"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>


<div class="web980">

  <div class="list_left">
    <div class="content">
      <div class="title">
        <h2><?php echo ($title); ?></h2>
        <div class="time">
          <a href="/www/songtree/">首页</a> > <?php echo ($daohan); ?>
        </div>
      </div>
      <div class="con">
        <?php echo ($content); ?>
      </div>

      <img src="__PUBLIC__/wap/images/0.jpg"/>
      <div class="lianxi">

        <p><span></span><?php echo ($webname); ?></p>
        <p><span>电话：</span><a href="tel:<?php echo ($tel); ?>"><?php echo ($tel); ?></a></p>
        <p><span>Q  Q：</span><?php echo ($qq[0]); ?></p>
        <p><span>地址：</span><?php echo ($address); ?></p>

      </div>
      <img src="__PUBLIC__/wap/images/1.jpg"/>


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