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
          <span><?php echo ($time); ?></span><a href="/www/songtree/">首页</a> > <?php echo ($daohan); ?>
        </div>
      </div>
      <div class="con">
        <?php echo ($content); ?>
      </div>

      <img src="__PUBLIC__/pcwap/images/0.jpg"/>
      <div class="lianxi">

        <p><span></span><?php echo ($webname); ?></p>
        <p><span>电话：</span><a href="tel:<?php echo ($tel); ?>"><?php echo ($tel); ?></a></p>
        <p><span>Q  Q：</span><?php echo ($qq[0]); ?></p>
        <p><span>地址：</span><?php echo ($address); ?></p>

      </div>
      <img src="__PUBLIC__/pcwap/images/1.jpg"/>
      <div class="prev">
        <a href="<?php echo ($prev[url]); ?>">上一篇</a>
      </div>
      <div class="next">
        <a href="<?php echo ($next[url]); ?>">下一篇</a>
      </div>
      <?php if($book): ?><div class="revlist">
          <h3><span>已有 <font color="red"><?php echo ($revs); ?></font> 条评论</span>评论列表</h3>
          <?php if(is_array($book)): $i = 0; $__LIST__ = $book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dl>
              <dt><span><?php echo date('Y-m-d',$vo['time']);?></span><?php echo ($i); ?>楼 #<?php echo ($vo["name"]); ?></dt>
              <dd><?php echo ($vo["content"]); ?></dd>
              <?php if($vo['reply']): ?><dd class="red">管理员回复：<?php echo ($vo["reply"]); ?></dd><?php endif; ?>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>

        </div><?php endif; ?>
      <?php if($isrev == 1): ?><div class="book">

          <form action="__GROUP__/book.php" method="post">
            <label><span>联系人：</span><input type="text" name="name"/></label>
            <label><span>电话：</span><input type="text" name="tel"/></label>
            <label><span>邮箱：</span><input type="text" name="email"/></label>
            <input type="hidden" name="infoid" value="<?php echo ($infoid); ?>"/>
            <label><span>备注：</span><textarea type="text" name="content" id="con"/></textarea></label>
            <label>
              <button type="button" id="postrev" onclick="postrev('__GROUP__/Book')">提交</button>
            </label>
          </form>
        </div><?php endif; ?>
    </div>


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