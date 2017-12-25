<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Language" content="zh-CN"/>
  <title><?php echo ($webtitle); ?>--<?php echo ($webname); ?></title>
  <meta name="Keywords" content="<?php echo ($webkey); ?>"/>
  <meta name="Description" content="<?php echo ($webdesc); ?>"/>
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/default/css/pintuer.css">
  <link rel="stylesheet" type="text/css" href="__PUBLIC__/default/css/style.css">
  <script type="text/javascript" src="__PUBLIC__/default/js/jquery.js"></script>
  <script type="text/javascript" src="__PUBLIC__/default/js/jquery.SuperSlide.2.1.1.js"></script>
  <style type="text/css">

  </style>
</head>
<body>
<!-- Banner -->
<div class="ontainer-layout" style="position: relative ;">
  <div class="x12">
    <div id="slideBox" class="slideBox">
      <div class="hd">
        <ul>
          <?php $adlists=M("ads")->where(array('id'=>array(IN,array(1,2,3,4))))->where('isshow=1')->order("id desc")->select();foreach ($adlists as $adlist):?><li></li><?php endforeach ?>
        </ul>
      </div>
      <div class="bd">
        <ul>
          <?php $adlists=M("ads")->where(array('id'=>array(IN,array(1,2,3,4))))->where('isshow=1')->order("id desc")->select();foreach ($adlists as $adlist):?><li><a href="<?php echo ($adlist['adurl']); ?>" target="_blank"><img style="width: 100%;height: 800px;" src="<?php echo ($adlist['adpic']); ?>"/></a></li><?php endforeach ?>
        </ul>
      </div>

      <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
      <a class="prev" href="javascript:void(0)"></a>
      <a class="next" href="javascript:void(0)"></a>

    </div>

    <script id="jsID" type="text/javascript">
      jQuery(".slideBox").slide({
        mainCell : ".bd ul",
        effect   : "left",
        autoPlay : true,
        trigger  : "click",
        delayTime: 1000,
        pnLoop   : false
      });
    </script>
  </div>
  <div class="navbg" style="position: absolute;">
    <div class="container">
      <!--  导航 -->
      <div class="x12">
        <div class="x2"><a href="<?php echo ($domain); ?>"><img src="<?php echo ($logo); ?>" alt="<?php echo ($webname); ?>" width="100%" height="65"/></a></div>
        <div class="navBar x10">
          <ul class="nav clearfix">
            <li id="m1" class="m"><h3><a href="/www/songtree/">首页</a></h3></li>
            <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li id="m<?php echo ($i); ?>" class="m"><h3><a href="<?php echo ($v1["url"]); ?>"><?php echo ($v1["catename"]); ?></a><i>/</i></h3>
                <div class="hot"></div>
                <?php if($v1['sub']): ?><ul class="sub">
                    <?php if(is_array($v1['sub'])): $i = 0; $__LIST__ = $v1['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i; if($v2["catename"] != '其它'): ?><li><a href="<?php echo ($v2["url"]); ?>"><?php echo ($v2["catename"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <li><a href="/qita.html">其它</a></li>
                  </ul><?php endif; ?>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </div>

        <script type="text/javascript">
          jQuery(".nav").slide({
            type         : "menu",
            titCell      : ".m",
            targetCell   : ".sub",
            effect       : "slideDown",
            delayTime    : 300,
            triggerTime  : 100,
            returnDefault: false
          });
        </script>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="x12 margin-large-top margin-large-bottom padding">
      <div class="x12 text-center top_bg margin-large-bottom">
        <h1 class="text-main x12" style="font-size: 30px;">pigman公司简介</h1>
        <h5 class="x12 text-gray">Company profile</h5>
        <span class="x12 margin-top height">
					<h3>pigpigman(猪猪侠)</h3>
					pigman专供猪肉类(服务商酒店，餐馆，客户个人)
          <br/> <br/>
					<h3>pigpigman(猪猪侠)联系</h3>
					目前开通了网站(http://www.songtreehy.com/www/songtree/),QQ服务；继后推出微信服务
				</span>
        <div class="bottom-xia x12 ">
          <div class="bottom-img margin-top"></div>
        </div>
      </div>
      <hr class="x12 hr"/>
    </div>
    <div class="x12  padding">
      <div class="x12 text-center margin-large-bottom">
        <h1 class="text-main x12" style="font-size: 30px;">pigman产品中心</h1>
        <h5 class="x12 text-gray margin-big-bottom">Product Center</h5>
        <div class="x12 margin-top grid-big">
          <?php $pcwap=M("info")->where(array('cid'=>array(IN,array(2,5))))->where(array('isshow'=>1,))->order("id desc")->limit(6)->select();foreach ($pcwap as $s=>$pcwap):$cate=M('cate')->find($pcwap["cid"]);$pcwap["catename"]=$cate['catename'];$pcwap["i"]=$s+1;$pcwap["cateurl"]=U('/'.$cate['url']);$pcwap['url']=U("/".$pcwap["id"]);$tags=M('tags')->where(array("pid"=>$pcwap['id']))->select(); foreach($tags as $va){ $pcwap['tags'].="<a href=".U('tag/'.$va[url]).">".$va[tags]."</a>"; } ?><div class="space x4 flash-hover">
              <div class="x12  border border-main  padding-small">
                <a href="<?php echo ($pcwap['url']); ?>">
                  <img style="width: 180px;height: 100px;" src="<?php echo ($pcwap['pic']); ?>" class="x12 ">
                  <span class="x12 padding-small text-gray"><?php echo ($pcwap['name']); ?></span>
                </a>
              </div>
            </div><?php endforeach ?>
        </div>
        <div class="bottom-xia x12 ">
          <div class="bottom-img margin-top"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="x12 bg-white">
    <div class="container">
      <div class="x12  padding">
        <div class="x12 text-center margin-large-bottom margin-large-top">
          <h1 class="text-main x12 margin-large-top" style="font-size: 30px;">pigman新闻动态</h1>
          <h5 class="x12 text-gray margin-big-bottom">News</h5>
          <div class="x12 margin-top grid-big">
            <?php $pcwap=M("info")->where(array('cid'=>array(IN,array(3))))->where(array('isshow'=>1,))->order("id desc")->limit(5)->select();foreach ($pcwap as $s=>$pcwap):$cate=M('cate')->find($pcwap["cid"]);$pcwap["catename"]=$cate['catename'];$pcwap["i"]=$s+1;$pcwap["cateurl"]=U('/'.$cate['url']);$pcwap['url']=U("/".$pcwap["id"]);$tags=M('tags')->where(array("pid"=>$pcwap['id']))->select(); foreach($tags as $va){ $pcwap['tags'].="<a href=".U('tag/'.$va[url]).">".$va[tags]."</a>"; } ?><div class="space x12  text-left">
                <div class="x12  zdy-bg  padding-large margin-big-top">
                  <a href="<?php echo ($pcwap['url']); ?>" class=" ">
                    <div class="x9  border-right border-gray padding-right">
                      <h2 class="x12 padding-small "
                          style="width:100%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis; display:block;">
                        <?php echo ($pcwap['name']); ?></h2>
                      <span class="x12 padding-small "><?php echo ($pcwap['desc']); ?></span>
                    </div>
                    <div class="x3 text-large padding-large-left li_1" style="color: #e0e0e0">
                      <span class="x6 padding-left"><?php echo (msubstr($pcwap["time"],5,5)); ?></span>
                      <span class="x12"></span>
                      <span class="x6 text-big padding-left"><?php echo (msubstr($pcwap["time"],0,4)); ?></span>
                    </div>
                  </a>
                </div>
              </div><?php endforeach ?>

          </div>
          <a class="bottom-xia x12 " href="/">
            <span class="more-img ">MORE</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="x12 footer_bg ">
    <div class="container">
      <div class="x12 bg-white margin-large-top">
        <div class="padding  x12 ">
          <div class="x12 padding border ">
            <div class=" margin x12"></div>
            <div class="x12 zdy ">
              <li class=" padding"><h5><a href="/">首页</a><i> /</i></h5></li>
              <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li class=" padding"><h5><a href="<?php echo ($v1["url"]); ?>"><?php echo ($v1["catename"]); ?></a><i> /</i></h5></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="x12 text-center">
              <span class="x12 padding-small">电话：<?php echo ($fax); ?></span>
              <span class="x12 padding-small">邮箱：<?php echo ($email); ?></span>
              <span class="x12 padding-small">手机：<?php echo ($tel); ?></span>
              <span class="x12 padding-small">地址：<?php echo ($address); ?></span>
            </div>
            <div class=" margin x12"></div>
          </div>
        </div>
      </div>
      <span class="x12 text-center padding-big text-gray">Copyright© 2017 版权所有：<a href="<?php echo ($domain); ?>"><?php echo ($webname); ?></a> 联系QQ：2468818839</span>
    </div>
  </div>
</div>
</body>
</html>