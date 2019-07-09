<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:36:"./template/default/index_thread.html";i:1515496683;s:36:"./template/default/index_header.html";i:1558972505;s:37:"./template/default/public_gradeh.html";i:1504321936;s:36:"./template/default/public_grade.html";i:1493128266;s:35:"./template/default/public_home.html";i:1510808618;s:35:"./template/default/index_right.html";i:1504066962;s:36:"./template/default/index_footer.html";i:1514127398;}*/ ?>
<!DOCTYPE html>
<html>
<head>  
<title><?php echo $tptt['title']; ?> - <?php echo config('web.WEB_AUT'); ?></title>
<meta name="keywords" content="<?php echo $tptt['keywords']; ?>">
<meta name="description" content="<?php echo $tptt['description']; ?>">
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
<link rel="stylesheet" href="__HOME__/css/thread.css">
<link rel="stylesheet" href="__HOME__/css/right.css">
<link rel="stylesheet" href="__ADMIN__/wangEditor/css/wangEditor.min.css">
<script type="text/javascript" src="__ADMIN__/wangEditor/js/wangEditor.min.js"></script>
<style type="text/css">
.wangEditor-menu-container .menu-item a {padding: 12px 0;}
.wangEditor-menu-container .menu-item {height: 37px;width: 37px;}
.wangEditor-menu-container .menu-group {padding: 0;}
.wangEditor-container {border: 1px solid #e6e6e6;}
.pagination {margin: 0 0 20px 0;}
.layui-form-item {margin: 15px 0;}
.wangEditor-container .wangEditor-txt img {max-width: 100%;height: auto;}
</style>
<div class="tpt-wp cl">
<div class="tpt-ml-7">
<div class="tpt-con1">
<div class="bdsharebuttonbox tpt-none-768 tpt-none-1024">
<a href="#" class="bds_tsina1 bds_ico" data-cmd="tsina" title="分享到新浪微博"></a>
<a href="#" class="bds_weixin1 bds_ico" data-cmd="weixin" title="分享到微信"></a>
<a href="#" class="bds_qzone1 bds_ico" style="border-bottom: 0px" d ata-cmd="qzone" title="分享到QQ空间"></a>
<a href="#pinglun" class="bds_pin bds_ico2" style="margin-top: 30px;border-bottom: 0px">评论</a>
</div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<div class="content">
<div class="tpt-thread">
<h1><a href="__ROOT__/thread/<?php echo $tptt['id']; ?>.html"><?php echo $tptt['title']; ?></a></h1>
<div class="tpt-tip">
<span class="tpt-tip-view"><a href="__ROOT__/view/<?php echo $tptt['cid']; ?>.html"><?php echo $tptt['name']; ?></a></span>
<?php if($tptt['settop'] == 1): ?><span class="tpt-tip-stick">置顶</span><?php endif; if($tptt['choice'] == 1): ?><span class="tpt-tip-jing">热门</span><?php endif; ?>
<div class="tpt-list-hint"> 
<i class="iconfont" title="回答">&#xe629;</i> <?php echo $tptt['reply']; ?>
<i class="iconfont" title="人气" style="font-size: 20px;position: relative;top: 2px;">&#xe60a;</i> <?php echo $tptt['view']; ?>
</div>
</div>
<div class="wangEditor-container cl" style="border: 0px solid #e6e6e6;min-height: 200px;">
<div class="wangEditor-txt" style="padding: 0;margin-top: 0;">
<?php echo htmlspecialchars_decode($tptt['content']); ?>
</div>
</div>
</div>
<?php if(config('web.WEB_FHF') != 0): ?>
<div class="fly-panel detail-box">
<div id="pinglun" class="tpt-tag-box cl"><span>发表评论</span></div>
<div class="cmt-item2 layui-form layui-form-pane">
<form>
<input type="hidden" value="<?php echo $tptt['userid']; ?>" name="mid">
<div class="layui-form-item layui-form-text">
<div class="layui-input-block">
<textarea id="textarea" name="content" required lay-verify="content" style="height:150px;width: 100%;"></textarea>
</div>
</div>
<div class="layui-form-item">
<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="comment_add">提交评论</button>
</div>
</form>
</div>
<div class="tpt-tag-tit cl"><h2><?php echo $tptt['reply']; ?> 个回复</h2></div>
<ul class="cmt-box jieda">
<?php if(is_array($tptc) || $tptc instanceof \think\Collection || $tptc instanceof \think\Paginator): $i = 0; $__LIST__ = $tptc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<li class="cmt-item jieda-daan" id="tpt<?php echo $vo['id']; ?>">
<div class="detail-about detail-about-reply">
<a class="jie-user" href="__ROOT__/home/<?php echo $vo['userid']; ?>.html"><img src="<?php echo $vo['userhead']; ?>" alt="<?php echo $vo['username']; ?>"><cite><i><?php echo $vo['username']; ?></i><?php if($vo['grades'] == 1): ?><em style="color:#5FB878">管理员</em><?php else: if($vo['point'] >= config('point.GRADE_AVIP') and $vo['point'] < config('point.GRADE_BVIP')): ?><em style="color:#FF9E3F"><?php echo config('point.GRADE_CVIP'); ?></em><?php endif; if($vo['point'] >= config('point.GRADE_DVIP') and $vo['point'] < config('point.GRADE_EVIP')): ?><em style="color:#FF9E3F"><?php echo config('point.GRADE_FVIP'); ?></em><?php endif; if($vo['point'] >= config('point.GRADE_GVIP') and $vo['point'] < config('point.GRADE_HVIP')): ?><em style="color:#FF9E3F"><?php echo config('point.GRADE_IVIP'); ?></em><?php endif; if($vo['point'] >= config('point.GRADE_JVIP')): ?><em style="color:#FF9E3F"><?php echo config('point.GRADE_KVIP'); ?></em><?php endif; endif; ?></cite></a>
<div class="detail-hits"><span><?php echo date("Y-m-d h:i:s",$vo['time']); ?></span></div>
<span style="float: right; color:#999; margin-right: 0px;">
<a style="color: #999;font-size: 13px;" class="reply-btn" href="javascript:;" reply="<?php echo $vo['userid']; ?>" at-user="true"><i style="margin-right: 4px;font-size: 18px;" class="layui-icon">&#xe63a;</i>回复</a>
<span class="username" style="display:none"><?php echo $vo['username']; ?></span>
<?php if($tptuser['userid'] == 1): ?>
<a class="del_btn" style="cursor: pointer;margin-left: 8px;color: #999;font-size: 13px;" member-id="<?php echo $vo['id']; ?>" member-fid="<?php echo $tptt['id']; ?>" title="删除">
<i style="font-size: 20px;position: relative;top: 1px;" class="layui-icon">&#xe640;</i>
删除
</a>
<?php endif; ?>
</span>
</div>
<div class="detail-body jieda-body">
<p><?php echo htmlspecialchars_decode($vo['content']); ?></p>
</div>
</li>
<?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="pages"><?php echo $tptc->render(); ?></div>
</div>
<?php endif; ?>
</div>
</div>
</div>
<div class="tpt-mr-3">
<div class="tpt-con2">
<div class="tpt-sidebar cl">
<div class="tpt-home">
<a href="__ROOT__/home/<?php echo $tptt['userid']; ?>.html"><img src="<?php echo $tptt['userhead']; ?>" alt="<?php echo $tptt['username']; ?>"></a>
<h1>
<a href="__ROOT__/home/<?php echo $tptt['userid']; ?>.html"><?php echo $tptt['username']; ?></a>
<?php if($tptt['sex'] == 1): ?>  <i class="layui-icon icon-nan">&#xe662;</i><?php else: ?> <i class="layui-icon icon-nv">&#xe661;</i><?php endif; ?></h1>
<p class="tpt-home-info">
<i class="layui-icon">&#xe735;</i><span style="color: #FF7200;"><?php echo $tptt['point']; ?></span>
<i class="layui-icon">&#xe60e;</i><span><?php echo date("Y-m-d",$tptt['usertime']); ?> 加入</span>
<i class="layui-icon">&#xe715;</i><span><?php if($tptt['userhome'] != ''): ?><?php echo $tptt['userhome']; else: ?>中国<?php endif; ?></span>
</p>
<p class="tpt-home-sign"><?php if($tptt['mdescription'] != ''): ?>（<?php echo $tptt['mdescription']; ?>）<?php else: ?>（这个人懒得留下签名）<?php endif; ?></p>
<div style="margin-top: 25px;" class="tpt-grid-org cl">
<a style="border: 1px solid #5FB878;background-color: #5FB878;color: #FFF;padding: 0 28px;" class="tougao layui-btn">我要投稿</a>
<a style="border: 1px solid #FF5722;background-color: #FF5722;color: #FFF;padding: 0 28px;" class="zanzhu layui-btn">我要打赏</a>
</div>
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
<script type="text/javascript">
$(function(){	
var form = $('.cmt-item2:last');
$('.cmt-box').delegate('.reply-btn','click',function(event){
var parent = $(this).closest('.cmt-item');
form.find(':hidden[name=mid]').val($(this).attr('reply'));
var textarea = parent.append(form).find('.wangEditor-txt p');
if($(this).attr('at-user') == 'true'){
var username = $(this).parent().find('.username').text();
textarea.text('回复 @' + username + ' : ');
}else{
textarea.text('');
}
moveEnd(textarea.get(0));
event.stopPropagation();
})
})
</script>
<script type="text/javascript">
var editor = new wangEditor('textarea');
editor.config.uploadImgUrl = '<?php echo url("index/upload/doUploadPic"); ?>';
editor.config.uploadImgFileName = 'FileName';
var W = document.documentElement.clientWidth || document.body.clientWidth;
if(W < 1008){
	editor.config.menus = [
	'bold',
	'underline',
	'italic',
	'forecolor',
	'link',
	'fullscreen',
	];
}else{
	editor.config.menus = [
	'bold',
	'underline',
	'italic',
	'strikethrough',
	'forecolor',
	'link',
	'unlink',
	'emotion',
	'img',
	'insertcode',
	'fullscreen',
	];
}
editor.config.pasteText = true;
editor.create();
</script>
<script type="text/javascript">
layui.use('form', function(){
var form = layui.form,
jq = layui.jquery;
jq('.del_btn').click(function(){
var id = jq(this).attr('member-id');
var fid = jq(this).attr('member-fid');
layer.confirm('确定删除次评论么?', function(index){
loading = layer.load(2, {
shade: [0.2,'#000']
});
jq.post('<?php echo url("index/comment/dels"); ?>',{'id':id,'fid':fid},function(data){
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
});
form.verify({
content: function(value){
if(value.replace(/<[^<>]+?>|[ ]|[&nbsp;]/g,'') == ''){
return '内容不得为空';
}
}
});
form.on('submit(comment_add)', function(data){
loading = layer.load(2, {
shade: [0.2,'#000']
});
var param = data.field;
jq.post('<?php echo url("index/comment/add",array("id"=>$tptt['id'])); ?>',param,function(data){
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
return false;
});
})
</script>
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