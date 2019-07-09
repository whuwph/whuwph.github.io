<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"./application/admin\view\index_home.html";i:1514042496;s:42:"./application/admin\view\index_header.html";i:1514021724;s:42:"./application/admin\view\index_footer.html";i:1504421378;}*/ ?>
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
<div class="tpt—index fly-panel fly-panel-user">
<table width="100%">
</table>
<blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">系统信息：</blockquote>
<table width="100%">
<tr><td>服务器类型</td><td><?php echo php_uname('s'); ?></td></tr>
<tr><td>PHP版本</td><td><?php echo PHP_VERSION; ?></td></tr>
<tr><td>Zend版本</td><td><?php echo Zend_Version(); ?></td></tr>
<tr><td>服务器解译引擎</td><td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td></tr>
<tr><td>服务器语言</td><td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?></td></tr>
<tr><td>服务器Web端口</td><td><?php echo $_SERVER['SERVER_PORT']; ?></td></tr>
</table>
<blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">开发团队：</blockquote>
<table width="100%">
<tr><td width="110px">版权所有</td><td><a href="https://shop116885045.taobao.com/shop/view_shop.htm?spm=a313o.201708ban.category.d53.483382ffpTcSpS&mytmenu=mdianpu&user_number_id=1042664704" target="_blank">淘宝店铺网站开发工作室</a>开发团队保留所有权利</td></tr>
<tr><td>感谢贡献者</td><td>ThinkPHP，Layer</td></tr>
<tr><td>特别提醒您</td><td>本套程序基于ThinkPHP5开发框架，致力于为您创建一个高效简洁但安全稳定的网站程序。</td></tr>
</table>
</div>
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