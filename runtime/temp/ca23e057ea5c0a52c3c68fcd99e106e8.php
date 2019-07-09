<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:35:"./template/default/index_index.html";i:1558972812;s:36:"./template/default/index_header.html";i:1558972505;s:37:"./template/default/public_gradeh.html";i:1504321936;s:37:"./template/default/public_zanzhu.html";i:1510812856;s:35:"./template/default/index_right.html";i:1504066962;s:36:"./template/default/index_footer.html";i:1514127398;}*/ ?>
<!DOCTYPE html>
<html>
<head>  
<title><?php echo config('web.WEB_TIT'); ?></title>
<meta name="keywords" content="<?php echo config('web.WEB_KEY'); ?>">
<meta name="description" content="<?php echo config('web.WEB_DES'); ?>">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
<link rel="stylesheet" href="__HOME__/css/style.css">
<link rel="stylesheet" href="__ADMIN__/style_css/index.css">
<link rel="stylesheet" href="__ADMIN__/font/css/font-awesome.min.css">
<script src="__ADMIN__/js/jquery-1.9.1.min.js"></script>
<script src="__HOME__/js/lanrenzhijia.js"></script>
<script src="__ADMIN__/layui/layui.js"></script>
<style type="text/css">
	
</style>
</head>
<body><!-- <img src="__HOME__/img/logo.png"> -->
<div class="tpt-header">
<div class="tpt-wp cl">
<div class="tpt-logo"><a href="__ROOT__/" ><font id="abcdef" size="5">创邦-吾燕科技博客</font></a></div>
<input id="nav-btn" type="checkbox">
<label class="tpt-nav-btn" for="nav-btn"></label>
<ul class="tpt-nav">
<li>
<a class="tpt-nav-li" href="__ROOT__/">网站首页</a>
<ul class="tpt-nav-ul"></ul>
</li>
<?php if(is_array($tptop) || $tptop instanceof \think\Collection || $tptop instanceof \think\Paginator): $k = 0; $__LIST__ = $tptop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($vo['shows'] == 1): ?>
<li>
<?php if($vo['links'] != ''): ?>
<a <?php if($vo['blank'] == 1): ?>target="_blank"<?php endif; ?> class="tpt-nav-li" href="<?php echo $vo['links']; ?>"><?php echo $vo['name']; ?></a>
<?php else: ?>
<input id="nav-<?php echo $vo['id']; ?>" type="checkbox"><label class="tpt-nav-li" for="nav-<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></label>
<?php endif; ?>
<ul class="tpt-nav-ul">
<?php if(is_array($tptops) || $tptops instanceof \think\Collection || $tptops instanceof \think\Paginator): $k = 0; $__LIST__ = $tptops;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($k % 2 );++$k;if($vo['id'] == $vs['tid']): if($vs['shows'] == 1): ?><li><a <?php if($vs['blank'] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo $vs['links']; ?>"><?php echo $vs['name']; ?></a></li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>
</li>
<?php endif; endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="tpt-status tpt-none-768 tpt-none-1024">
<?php if(\think\Session::get('validate') != ''): ?>
<h2><a href="__ROOT__/home/<?php echo $tptuser['userid']; ?>.html"><img id="logohead" src="<?php echo $tptuser['userhead']; ?>"><?php echo $tptuser['username']; ?></a></h2>
<?php if($tptuser['reply'] != 0): ?>
<a class="mes" href="__ROOT__/user/message.html"><?php echo $tptuser['reply']; ?></a>
<?php endif; ?>
<ul>
<li><a href="__ROOT__/home/<?php echo $tptuser['userid']; ?>.html"><i class="layui-icon">&#xe612;</i>我的主页</a></li>
<li><a href="javascript:void(0)"><i class="layui-icon">&#xe658;</i><?php if($tptuser['userid'] == 1): ?>
<em>管理员</em>
<?php else: if($tptuser['point'] >= config('point.GRADE_AVIP') and $tptuser['point'] < config('point.GRADE_BVIP')): ?>
<em><?php echo config('point.GRADE_CVIP'); ?></em>
<?php endif; if($tptuser['point'] >= config('point.GRADE_DVIP') and $tptuser['point'] < config('point.GRADE_EVIP')): ?>
<em><?php echo config('point.GRADE_FVIP'); ?></em>
<?php endif; if($tptuser['point'] >= config('point.GRADE_GVIP') and $tptuser['point'] < config('point.GRADE_HVIP')): ?>
<em><?php echo config('point.GRADE_IVIP'); ?></em>
<?php endif; if($tptuser['point'] >= config('point.GRADE_JVIP')): ?>
<em><?php echo config('point.GRADE_KVIP'); ?></em>
<?php endif; endif; ?></a></li>
<li><a href="__ROOT__/user/set.html"><i class="layui-icon">&#xe614;</i>设置</a></li>
<li><a class="logout" href="javascript:void(0)"><i class="iconfont" style="top: 2px;">&#xe671;</i>退出</a></li>
</ul>
<?php else: if(config('web.WEB_LOG') == 1): ?>
<a class="rega" href="__ROOT__/user/login.html">登录</a>
<a class="regb" href="__ROOT__/user/reg.html">注册</a>
<?php endif; if(config('web.WEB_LOG') == 2): ?>
<a class="login" href="javascript:void(0)"><i class="iconfont">&#xe627;</i>立即登录</a>
<?php endif; if(config('web.WEB_LOG') == 3): ?>
<a class="login" href="javascript:void(0)"><i class="iconfont">&#xe627;</i></a>
<a class="rega" href="__ROOT__/user/login.html">登录</a>
<a class="regb" href="__ROOT__/user/reg.html">注册</a>
<?php endif; endif; ?>
</div>
</div>
</div>
<div class="tpt-none-1200 tpt-none-1920">
<?php if(\think\Session::get('validate') != ''): ?>
<div class="PathInner" id="PathMenu">
<div class="PathMain"><div onclick="PathRun();">
<?php if($tptuser['reply'] != 0): ?>
<a class="tpt-message" href="__ROOT__/user/message.html"><?php echo $tptuser['reply']; ?></a>
<?php endif; ?>
<img src="<?php echo $tptuser['userhead']; ?>"></div></div>
<div class="PathItem"><a class="cola link logout"><i class="iconfont">&#xe671;</i></a></div>
<div class="PathItem"><a class="colb link" href="__ROOT__/user/set.html"><i class="layui-icon">&#xe614;</i></a></div>
<div class="PathItem"><a class="cold link tougao"><i class="layui-icon">&#xe609;</i></a></div>
<div class="PathItem"><a class="colc link" href="__ROOT__/home/<?php echo $tptuser['userid']; ?>.html"><i class="layui-icon">&#xe612;</i></a></div>
</div>
<?php else: ?>
<div class="PathInner" id="PathMenu">
<div class="PathMain"><div onclick="PathRun();"><em>登录</em></div></div>
<?php if(config('web.WEB_LOG') == 1): ?>
<div class="PathItem"><a class="colb link" href="__ROOT__/user/login.html"><i class="iconfont" style="font-size: 20px;">&#xe646;</i></a></a></div>
<div class="PathItem"></div>
<div class="PathItem"></div>
<div class="PathItem"></div>
<?php endif; if(config('web.WEB_LOG') == 2): ?>
<div class="PathItem"><a class="cola link login" href="javascript:void(0)"><i class="iconfont" style="font-size: 22px;">&#xe613;</i></a></div>
<div class="PathItem"></div>
<div class="PathItem"></div>
<div class="PathItem"></div>
<?php endif; if(config('web.WEB_LOG') == 3): ?>
<div class="PathItem"><a class="cola link login" href="javascript:void(0)"><i class="iconfont" style="font-size: 22px;">&#xe613;</i></a></div>
<div class="PathItem"><a class="colb link" href="__ROOT__/user/login.html"><i class="iconfont" style="font-size: 20px;">&#xe646;</i></a></div>
<div class="PathItem"></div>
<div class="PathItem"></div>
<?php endif; endif; ?>
</div>
</div>
<link rel="stylesheet" href="__HOME__/css/index.css">
<link rel="stylesheet" href="__HOME__/css/right.css">
<div class="tpt-wp cl">
<div class="tpt-ml-7">
<div class="tpt-con1">
<?php if(config('web.WEB_FTP') != 0): ?>
<div class="tpt-banner tpt-none-768 cl">
<div class="layui-carousel" id="banner">
  <div carousel-item>
    <?php if(is_array($tptb) || $tptb instanceof \think\Collection || $tptb instanceof \think\Paginator): $i = 0; $__LIST__ = $tptb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div><a target="_blank" href="<?php echo $vo['links']; ?>"><img src="__UPLO__<?php echo $vo['pic']; ?>"></a></div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>
<script>
layui.use('carousel', function(){
  var carousel = layui.carousel;
  carousel.render({
    elem: '#banner'
    ,width: '100%'
    ,height: '320px'
	,interval: 4000
    ,arrow: 'always'
  });
});
</script>
</div>
<?php endif; if(config('web.WEB_FDZ') != 0): ?>
<div class="tpt-dingzhi tpt-none-768 tpt-none-1024 tpt-none-1200 cl">
<h3>顶置推荐</h3>
<ul>
<?php if(is_array($tptc) || $tptc instanceof \think\Collection || $tptc instanceof \think\Paginator): $i = 0; $__LIST__ = $tptc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li>
<a href="__ROOT__/thread/<?php echo $vo['id']; ?>.html">
<?php if($vo['pic'] != ''): ?>
<img src="__UPLO__<?php echo $vo['pic']; ?>" alt="<?php echo $vo['title']; ?>">
<?php else: ?>
<img src="__HOME__/img/1.jpg" alt="暂无图片">
<?php endif; ?>
</a>
<h2><a href="__ROOT__/thread/<?php echo $vo['id']; ?>.html" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?></a></h2>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<div class="tpt-none-768 tpt-none-1024 tpt-none-1200 tpt-bottom"></div>
<?php endif; if(config('web.WEB_FHY') != 0): ?>
<div class="tpt-heads tpt-none-768 tpt-none-1024 tpt-none-1200 cl" id="tpt-heads">
<h3 ><i class="fa fa-user-o"></i> 最新用户</h3>
<ul>
<?php if(is_array($tptm) || $tptm instanceof \think\Collection || $tptm instanceof \think\Paginator): $i = 0; $__LIST__ = $tptm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li>
<a href="__ROOT__/home/<?php echo $vo['userid']; ?>.html"><img src="<?php echo $vo['userhead']; ?>" alt="<?php echo $vo['username']; ?>"></a>
<p><a href="__ROOT__/home/<?php echo $vo['userid']; ?>.html" title="<?php echo $vo['username']; ?>"><?php echo $vo['username']; ?></a></p>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
<div class="tpt-none-768 tpt-none-1024 tpt-none-1200 tpt-bottom"></div>
<?php endif; ?>

<ul class="tpt-list">
		
<h3><i class="fa fa-snowflake-o"></i> 最新文章</h3>

<?php if(is_array($tptcs) || $tptcs instanceof \think\Collection || $tptcs instanceof \think\Paginator): $i = 0; $__LIST__ = $tptcs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<div id="border">
<li class="tpt-list-li">
<?php if($vo['choice'] == 1): ?><div class="mod-angle">热</div><?php endif; ?>
<a href="__ROOT__/thread/<?php echo $vo['id']; ?>.html" class="tpt-list-avatar">
<?php if($vo['pic'] != ''): ?>
<img src="__UPLO__<?php echo $vo['pic']; ?>" alt="<?php echo $vo['title']; ?>" style="margin-top: 15px;">
<?php else: ?>
<img src="__HOME__/img/1.jpg" alt="暂无图片">
<?php endif; ?>
</a>
<h2 class="tpt-tip"><a href="__ROOT__/thread/<?php echo $vo['id']; ?>.html"><?php echo $vo['title']; ?></a></h2>
<p>
<span><a href="__ROOT__/home/<?php echo $vo['userid']; ?>.html"><img src="__UPLO__<?php echo $vo['userhead']; ?>" alt="<?php echo $vo['username']; ?>"><?php echo $vo['username']; ?></a></span>
<span class="tpt-none-768"><?php echo date("Y-m-d h:i:s",$vo['time']); ?></span>
<span class="tpt-list-hint" style="padding-right: 0;"> 
<i class="iconfont class-with-tooltip" title="已有 <?php echo $vo['reply']; ?> 条评论" >&#xe629;<font color="#787878"> <?php echo $vo['reply']; ?> </font></i> 
<i class="iconfont" title="人气" style="font-size: 20px;position: relative;top: 2px;">&#xe60a;</i> <?php echo $vo['view']; ?>
</span>
</p>
<p class="tpt-none-768">

    <?php echo substr($vo['description'],0,200); ?>
</p>
<p style="padding-top: 0;line-height: 20px;">
<span class="tpt-none-768 tpt-none-1024 tpt-none-1200 y" style="padding-right: 0;"><a href="__ROOT__/view/<?php echo $vo['cid']; ?>.html"><?php echo $vo['name']; ?></a></span>
</p>
</li>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="pages"><?php echo $tptcs->render(); ?></div>
</div>
</div>

<div class="tpt-mr-3">
<div class="tpt-con2">
<div class="tpt-stat cl">
<div class="tpt-tsearch cl">
<form action="__ROOT__/search.html">
<input placeholder="搜索" type="text" name="ks" value="<?php echo input('ks');?>" required lay-verify="required" autocomplete="off">
<button><i class="layui-icon" style="font-size: 18px;">&#xe615;</i></button>
</form>
</div>
<div class="tpt-stat-list cl">
<ul>
<li><span><?php echo $tptca; ?></span>文章总数</li>
<li style="border-left: 1px solid #f1f1f1;border-right: 1px solid #f1f1f1;"><span><?php echo $tptcm; ?></span>会员总数</li>
<li><span><?php echo $tptcc; ?></span>评论总数</li>
</ul>
</div>
<div class="tpt-grid-org cl">
<h2>欢迎打赏投稿</h2>
<a style="border: 1px solid #5FB878;background-color: #5FB878;color: #FFF;padding: 0 28px;" class="tougao layui-btn">我要投稿</a>
<a style="border: 1px solid #FF5722;background-color: #FF5722;color: #FFF;padding: 0 28px;" class="zanzhu layui-btn">我要打赏</a>
</div>
</div>
<div class="tpt-sidebar cl">
	<h3>热门标签</h3>
	<div class="tpt-f cl">
     <?php if(is_array($tagss) || $tagss instanceof \think\Collection || $tagss instanceof \think\Paginator): $i = 0; $__LIST__ = $tagss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?>
	 <a href="__ROOT__/tags.html?id=<?php echo $tag; ?>"><?php echo $tag; ?></a>
	 <?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>

<?php if(config('web.WEB_FTJ') != 0): ?>
<div class="tpt-sidebar cl">
	<h3>热门推荐</h3>
	<ul class="tpt-c cl">
		<?php if(is_array($tptf) || $tptf instanceof \think\Collection || $tptf instanceof \think\Paginator): $i = 0; $__LIST__ = $tptf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li>
		<a href="__ROOT__/thread/<?php echo $vo['id']; ?>.html"><?php echo $vo['title']; ?></a>
		<p><?php echo date("Y-m-d h:i:s",$vo['time']); ?></p>
		</li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<?php endif; if(config('web.WEB_FJX') != 0): ?>
<div class="tpt-sidebar cl">
	<h3>精选内容</h3>
	<ul class="tpt-d cl">
	    <?php if(is_array($tpte) || $tpte instanceof \think\Collection || $tpte instanceof \think\Paginator): $i = 0; $__LIST__ = $tpte;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li>
		<div>
		<a href="__ROOT__/thread/<?php echo $vo['id']; ?>.html">
		<?php if($vo['pic'] != ''): ?>
		<img src="__UPLO__<?php echo $vo['pic']; ?>" alt="<?php echo $vo['title']; ?>">
		<?php else: ?>
		<img src="__HOME__/img/1.jpg" alt="暂无图片">
		<?php endif; ?>
		</a>
		</div>
		<p><a href="__ROOT__/thread/<?php echo $vo['id']; ?>.html"><?php echo $vo['title']; ?></a></p>
		</li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<?php endif; ?>

<div class="tpt-sidebar cl">
	<h3>友情连接</h3>
	<ul class="tpt-e cl">
		<?php if(is_array($tptl) || $tptl instanceof \think\Collection || $tptl instanceof \think\Paginator): $i = 0; $__LIST__ = $tptl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li><a target="_blank" href="<?php echo $vo['links']; ?>"><?php echo $vo['name']; ?></a></li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>


</div>
</div>

</div>
<div class="tpt-footer footer tpt-mat-30 cl">
	<div class="tpt-wp cl">
		<div class="tpt-md-1">
			<div class="tpt-mds">
				<p class="bq">
Copyright© 2014-2017
					<span class="pipe">|</span>
                    <a class="banquan" target="_blank" href="<?php echo config('web.WEB_COM'); ?>">Powered by <?php echo config('web.WEB_AUT'); ?></a>
					<span class="tpt-none-768 tpt-none-1024">
					<span class="pipe">|</span>
					<a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo config('web.WEB_ICP'); ?></a>
					<span class="pipe">|</span>
					<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo config('web.WEB_QQ'); ?>&site=qq&menu=yes" target="_blank">QQ:<?php echo config('web.WEB_QQ'); ?></a>
					</span>
				</p>
			</div>
		</div>
	</div>
</div>
<div id="zanzhus" class="tpt-zan cl" style="display: none;">
<div class="layui-tab">
  <h2>感谢您的支持，我会继续努力的</h2>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show"><img src="__HOME__/img/alipay.png"></div>
    <div class="layui-tab-item"><img src="__HOME__/img/weipay.png"></div>
	<p>感谢您的打赏</p>
  </div>
  <ul class="layui-tab-title">
    <li class="layui-this"><span class="zanbox"></span><img src="__HOME__/img/ali.jpg" alt="支付宝"></li>
    <li><span class="zanbox"></span><img src="__HOME__/img/wei.jpg" alt="微信"></li>
  </ul>
  <h3>打开支付宝或微信扫一扫，即可进行扫码打赏哦</h3>
</div>
</div>
<script type="text/javascript">
layui.use(['layer','jquery','element'], function(){
  var layer = layui.layer,
  element = layui.element,
  jq = layui.jquery;
  jq('.logout').click(function(){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    jq.getJSON('<?php echo url("index/login/logout"); ?>',function(data){
      if(data.code == 200){
        layer.close(loading);
        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
          location.reload();
        });
      }else{
        layer.close(loading);
        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
      }
    });
  });
	var W = document.documentElement.clientWidth || document.body.clientWidth;
	if(W < 1008){
	jq('.login').click(function(){
	   layer.open({
			type: 2,
			title: 'QQ登陆',
			maxmin: false,
			shadeClose: true,
			shade: 0.1,
			area: ['260px', '260px'],
			content: '<?php echo config("web.WEB_COM"); ?>/user/qq.html',
			end: function(){location.reload();}
		});
	  });
	}else{
	jq('.login').click(function(){
	   layer.open({
			type: 2,
			title: 'QQ登陆',
			maxmin: false,
			shadeClose: true,
			shade: 0.1,
			area: ['500px', '500px'],
			content: '<?php echo config("web.WEB_COM"); ?>/user/qq.html',
			end: function(){location.reload();}
		});
	});
	}
  jq('.zanzhu').click(function(){    
       layer.open({
			type:1,
			title:'',
			shadeClose:true,
			area:['450px','400px'],
			content:$('#zanzhus')
	   });
  });
  jq('.tougao').click(function(){
	var exp = "<?php echo \think\Session::get('validate'); ?>"
	if(exp == ""){
	    layer.msg('亲！请登录', {icon: 2, anim: 6, time: 1000});
	}else{
		if('<?php echo config("web.WEB_ADD"); ?>' == 1 && '<?php echo $tptuser['status']; ?>' == 1){
		   location.href = '__ROOT__/add.html';
		}else{
		   layer.msg('已关闭投稿', {icon: 2, anim: 6, time: 1000});
		}
	}
  });
})
</script>
</body>
</html>