<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./application/admin\view\index_index.html";i:1514023252;s:42:"./application/admin\view\index_header.html";i:1514021724;s:42:"./application/admin\view\index_footer.html";i:1504421378;}*/ ?>
<!DOCTYPE html>
<html>
<head>  
  <title>内容管理系统 - 内容管理系统</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="/favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
  <link rel="stylesheet" href="__ADMIN__/css/global.css">
  <script src="__ADMIN__/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="__ADMIN__/layui/layui.js" type="text/javascript"></script>
</head>
<body>
<style type="text/css">
.layui-nav-tree .layui-this{background-color: #393D49;color: #fff;}
</style>
<div class="header">
  <div class="main">
    <a class="logo" href="<?php echo url('index/index'); ?>" title="内容管理系统"><img src="__ADMIN__/img/logo.png"></a>
	<span></span>
    <div class="nav-user">
      <a class="avatar">
        <img src="__ROOT__<?php echo \think\Session::get('adminhead'); ?>">
        <cite><?php echo $tptadmin['adminname']; ?></cite>
        <i>管理员</i>
      </a>
      <div class="nav">
        <a target="_blank" href="__INDEX__"><i class="layui-icon" style="top: 3px; font-size: 24px;padding-right: 8px;">&#xe609;</i>网站首页</a>
		<a class="xiugai" style="cursor: pointer;"><i class="layui-icon" style="top: 2px; font-size: 24px;padding-right: 6px;">&#xe620;</i>密码修改</a>
        <a class="logi_logout" href="javascript:void(0)"><i class="layui-icon" style="top: 4px;font-size: 24px;padding-right: 8px;">&#x1006;</i>退出</a>
      </div>
    </div>
  </div>
</div>

<div class="main fly-user-main layui-clear">
<ul class="layui-nav layui-nav-tree">

	<li class="layui-nav-item layui-nav-itemed">
    <a href="javascript:;">内容管理</a>
    <dl class="layui-nav-child">
	  <dd><a href="<?php echo url('navtop/index'); ?>" target="main"><i class="layui-icon">&#xe609;</i>导航管理</a></dd>
      <dd><a href="<?php echo url('category/index'); ?>" target="main"><i class="layui-icon">&#xe61f;</i>板块管理</a></dd>
      <dd><a href="<?php echo url('content/index'); ?>" target="main"><i class="layui-icon">&#xe63c;</i>内容管理</a></dd>
	  <dd><a href="<?php echo url('comment/index'); ?>" target="main"><i class="layui-icon">&#xe63a;</i>评论管理</a></dd>
    </dl>
    </li>

	<li class="layui-nav-item layui-nav-itemed">
    <a href="javascript:;">综合管理</a>
    <dl class="layui-nav-child">
	  <dd><a href="<?php echo url('member/index'); ?>" target="main"><i class="layui-icon">&#xe612;</i>会员管理</a></dd>
      <dd><a href="<?php echo url('banner/index'); ?>" target="main"><i class="layui-icon">&#xe60d;</i>图片管理</a></dd>
	  <dd><a href="<?php echo url('links/index'); ?>" target="main"><i class="layui-icon">&#xe64e;</i>友情连接</a></dd>
	  <dd><a href="<?php echo url('point/index'); ?>" target="main"><i class="layui-icon">&#xe641;</i>积分管理</a></dd>
    </dl>
    </li>
	
	<li class="layui-nav-item layui-nav-itemed">
    <a href="javascript:;">系统管理</a>
    <dl class="layui-nav-child">
      <dd><a href="<?php echo url('admin/index'); ?>" target="main"><i class="layui-icon">&#xe614;</i>管理修改</a></dd>
	  <dd><a href="<?php echo url('config/index'); ?>" target="main"><i class="layui-icon">&#xe62c;</i>网站配置</a></dd>
	  <dd><a class="update_cache" href="javascript:void(0)"><i class="layui-icon">&#xe640;</i>清理缓存</a></dd>
    </dl>
    </li>
</ul>
</div>

<div class="layui-body iframe-container">
<iframe class="admin-iframe" id="admin-iframe" name="main" src="<?php echo url('index/home'); ?>"></iframe>
</div>

<div id="xiugais" style="display: none;">
<form class="layui-form" style="padding: 20px;">
  <input type="hidden" name="adminid" value="1">
  <div class="layui-form-item">
	  <input type="password" name="password" required lay-verify="required" placeholder="输入密码" autocomplete="off" class="layui-input">
  </div>
  <div class="layui-form-item">
	  <input type="password" name="passwords" required lay-verify="required" placeholder="确认密码" autocomplete="off" class="layui-input">
  </div>
  <div class="layui-form-item">
	  <button class="layui-btn" lay-submit="" lay-filter="admin_edit">立即提交</button>
  </div>
   </form>
</div>

<script type="text/javascript">
layui.use(['form', 'layer', 'element'], function(){
  var form = layui.form,
  layer = layui.layer,
  element = layui.element,
  jq = layui.jquery;

  jq('.left_menu_ul .layui-nav-item').click(function(){
    jq('.left_menu_ul .layui-nav-item').removeClass('layui-this');
    jq(this).addClass('layui-this');
    jq("#iframe-mask").show();
    jq("#admin-iframe").load(function(){   
      jq("#iframe-mask").fadeOut(100);
    });
  });

  jq('.update_cache').click(function(){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    jq.getJSON('<?php echo url("index/update"); ?>',function(data){
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

  jq('.logi_logout').click(function(){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    jq.getJSON('<?php echo url("login/logout"); ?>',function(data){
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

  jq('.xiugai').click(function(){    
       layer.open({
			type:1,
			title:'密码修改',
			shadeClose:true,
			area:['320px','250px'],
			content:$('#xiugais')
	   });
  });

  form.on('submit(admin_edit)', function(data){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    var param = data.field;
    jq.post('<?php echo url("admin/edit"); ?>',param,function(data){
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

});
</script>
<script>
layui.use(['layer','jquery'], function(){
  var layer = layui.layer,
  jq = layui.jquery;

  jq('.logi_logout').click(function(){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    jq.getJSON('<?php echo url("login/logout"); ?>',function(data){
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

})
</script>
</body>
</html>