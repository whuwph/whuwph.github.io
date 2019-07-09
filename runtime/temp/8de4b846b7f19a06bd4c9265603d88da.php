<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:32:"./template/default/login_qq.html";i:1506497406;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
<script src="__ADMIN__/layui/layui.js" type="text/javascript"></script>
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="<?php echo config('web.WEB_QQID'); ?>" data-redirecturi="<?php echo config('web.WEB_COM'); ?>/user/login.html" charset="utf-8"></script>
</head>
<body>
<script type="text/javascript">
layui.use(['layer'], function(){
	var layer = layui.layer,
	$ = layui.jquery;
	var	is_login = QC.Login.check();
	if(is_login){
		var access_token = '';
		var openid = '';
		QC.Login.getMe(function(openId, accessToken){
			access_token = accessToken;
			openid = openId;
		});
		var paras = {oauth_consumer_key:'<?php echo config("web.WEB_QQID"); ?>',access_token:access_token,openid:openid};
		QC.api('get_user_info', paras).success(function(s){
			//成功回调，通过s.data获取OpenAPI的返回数据
			var	param ={openid:openid,username:s.data.nickname,userhead:s.data.figureurl_qq_2,sex:s.data.gender};
			$.post('<?php echo url("index/login/loginqq"); ?>',param,function(res){
		      if(res.code == 200){
		      	QC.Login.signOut()//注销qq登陆
				layer.msg(res.msg, {icon: 1, anim: 6, time: 1000});
				var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引
				parent.layer.close(index); //再执行关闭
		      }else{
		        QC.Login.signOut()//注销qq登陆
				layer.msg(res.msg, {icon: 2, anim: 6, time: 1000}, function(){
	            var index = parent.layer.getFrameIndex(window.name);
				parent.layer.close(index); 
				});
		      }
		    });
			
			//alert("获取用户信息成功！当前用户昵称为："+s.data.nickname);
		});

	}else{ 
		self.location.href='https://graph.qq.com/oauth2.0/authorize?client_id=<?php echo config("web.WEB_QQID"); ?>&response_type=token&scope=all&redirect_uri='+encodeURIComponent(self.location.href);
	}
});
	
</script>
</body>
</html>