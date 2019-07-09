<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"./application/admin\view\config_index.html";i:1510819994;s:42:"./application/admin\view\index_header.html";i:1514021724;s:42:"./application/admin\view\index_footer.html";i:1504421378;}*/ ?>
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
<div class="fly-panel fly-panel-user">
<div class="tpt—admin">
<style type="text/css">
.tpt_sels a{padding-right:15px;position:relative}
.tpt_sels a{padding:0 20px 0 8px;color:#3B6268;background:#FFFFBA;border:1px #F8E06E solid;margin-right:5px;margin-bottom:5px;font-size:14px;height:26px;line-height:26px;display:block;float:left}
.tpt_sels a em{width: 12px;height: 12px;font-style: normal;display: block;position: absolute;top: 7px;right: 4px;z-index: 2;background: url(__ADMIN__/img/sx.png) no-repeat 0 0;}
</style>
<form class="layui-form">

<div class="layui-tab">
  <ul class="layui-tab-title">
    <li class="layui-this">基本设置</li>
    <li>常用设置</li>
	<li>数目设置</li>
  </ul>
  <div class="layui-tab-content" style="padding: 20px 0 0 0;">
    <div class="layui-tab-item layui-show">
	
	
  <div class="layui-form-item">
    <label class="layui-form-label">标题</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_TIT" value="<?php echo config('web.WEB_TIT'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">域名</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_COM" value="<?php echo config('web.WEB_COM'); ?>" placeholder="后面不要加斜杠/" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">作者</label>
    <div class="layui-input-block">
      <input type="text" name="WEB_AUT" value="<?php echo config('web.WEB_AUT'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">QQ</label>
    <div class="layui-input-block">
      <input type="text" name="WEB_QQ" value="<?php echo config('web.WEB_QQ'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">备案</label>
    <div class="layui-input-block">
      <input type="text" name="WEB_ICP" value="<?php echo config('web.WEB_ICP'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">关键词</label>
    <div class="layui-input-block">
      <input type="text" name="WEB_KEY" value="<?php echo config('web.WEB_KEY'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">描述</label>
    <div class="layui-input-block">
	  <textarea name="WEB_DES" placeholder="请输入内容" class="layui-textarea"><?php echo config('web.WEB_DES'); ?></textarea>
    </div>
  </div>

  <div class="tpt_item">
	<input type="hidden" name="WEB_TAG" value="<?php echo config('web.WEB_TAG'); ?>">
	<div id="tpt_sel" class="tpt_sels" style="margin-top: 20px;">
		<span style="margin-bottom: 5px;float: left;margin-left: 110px;">
		<?php if(config('web.WEB_TAG') != ''): $arr=explode(',', config('web.WEB_TAG'));foreach ($arr as $k=>$v){echo "<a href='javascript:;'>$v<em></em></a>";}endif; ?>
		</span>
		<div class="layui-form-item" style="margin-bottom: 20px;">
			<label class="layui-form-label">标签</label>
			<div class="layui-input-block">
				<input id="tpt_input" type="text" value="" autocomplete="off" class="layui-input" style="width: 400px;float: left;margin-right: 20px;">
				<button class="layui-btn" id="tpt_btn" type="button" style="background: #FF5722;">添加标签</button>
			</div>
		</div>
	</div>
  </div>

	</div>
    <div class="layui-tab-item">
  <blockquote class="layui-elem-quote">需要去QQ互联申请：<a href="https://connect.qq.com/" target="_blank" style="color:#FF5722;">申请地址</a>，回调地址：你的域名/user/qq.html</blockquote>
  
  <div class="layui-form-item">
    <label class="layui-form-label">登录模式</label>
    <div class="layui-input-block">
      <input type="radio" name="WEB_LOG" value="0" title="关闭注册登录" <?php if(config('web.WEB_LOG') == 0): ?>checked<?php endif; ?>>
	  <input type="radio" name="WEB_LOG" value="1" title="允许账号登录" <?php if(config('web.WEB_LOG') == 1): ?>checked<?php endif; ?>>
	  <input type="radio" name="WEB_LOG" value="2" title="允许QQ登录" <?php if(config('web.WEB_LOG') == 2): ?>checked<?php endif; ?>>
	  <input type="radio" name="WEB_LOG" value="3" title="允许混合登录" <?php if(config('web.WEB_LOG') == 3): ?>checked<?php endif; ?>>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">验证码</label>
    <div class="layui-input-block">
      <input type="radio" name="WEB_YAN" value="1" title="开启" <?php if(config('web.WEB_YAN') == 1): ?>checked<?php endif; ?>>
	  <input type="radio" name="WEB_YAN" value="0" title="关闭" <?php if(config('web.WEB_YAN') == 0): ?>checked<?php endif; ?>>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">QQID</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_QQID" value="<?php echo config('web.WEB_QQID'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">QQKEY</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_QQKEY" value="<?php echo config('web.WEB_QQKEY'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">主题名称</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_TPT" value="<?php echo config('web.WEB_TPT'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">发帖审核</label>
    <div class="layui-input-block">
      <input type="radio" name="WEB_OPE" value="0" title="开启" <?php if(config('web.WEB_OPE') == 0): ?>checked<?php endif; ?>>
	  <input type="radio" name="WEB_OPE" value="1" title="关闭" <?php if(config('web.WEB_OPE') == 1): ?>checked<?php endif; ?>>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">评论审核</label>
    <div class="layui-input-block">
      <input type="radio" name="WEB_CNE" value="0" title="开启" <?php if(config('web.WEB_CNE') == 0): ?>checked<?php endif; ?>>
	  <input type="radio" name="WEB_CNE" value="1" title="关闭" <?php if(config('web.WEB_CNE') == 1): ?>checked<?php endif; ?>>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">允许投稿</label>
    <div class="layui-input-block">
      <input type="radio" name="WEB_ADD" value="1" title="开启" <?php if(config('web.WEB_ADD') == 1): ?>checked<?php endif; ?>>
	  <input type="radio" name="WEB_ADD" value="0" title="关闭" <?php if(config('web.WEB_ADD') == 0): ?>checked<?php endif; ?>>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">允许评论</label>
    <div class="layui-input-block">
      <input type="radio" name="WEB_CNT" value="1" title="开启" <?php if(config('web.WEB_CNT') == 1): ?>checked<?php endif; ?>>
	  <input type="radio" name="WEB_CNT" value="0" title="关闭" <?php if(config('web.WEB_CNT') == 0): ?>checked<?php endif; ?>>
    </div>
  </div>

	</div>


  <div class="layui-tab-item">
  <div class="layui-form-item">
    <label class="layui-form-label">图片数目</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_FTP" value="<?php echo config('web.WEB_FTP'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">会员数目</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_FHY" value="<?php echo config('web.WEB_FHY'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">顶置数目</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_FDZ" value="<?php echo config('web.WEB_FDZ'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">推荐数目</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_FTJ" value="<?php echo config('web.WEB_FTJ'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">精选数目</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_FJX" value="<?php echo config('web.WEB_FJX'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">回复数目</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_FHF" value="<?php echo config('web.WEB_FHF'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">分页数目</label>
    <div class="layui-input-block">
	  <input type="text" name="WEB_FYS" value="<?php echo config('web.WEB_FYS'); ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

	</div>
  </div>
</div>

  <div class="layui-form-item">
    <div class="layui-input-block">
	  <button class="layui-btn" lay-submit="" lay-filter="config_add">立即提交</button>
    </div>
  </div>
</form>

</div>
</div>
<script type="text/javascript" src="__ADMIN__/js/input.js"></script>
<script>
layui.use(['form','element'],function(){
  var form = layui.form,
  element = layui.element,
  jq = layui.jquery;
  
  form.on('submit(config_add)', function(data){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    var param = data.field;
    jq.post('<?php echo url("config/add"); ?>',param,function(data){
      if(data.code == 200){
        layer.close(loading);
        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
          location.href = '<?php echo url("config/index"); ?>';
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