{__NOLAYOUT__}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <style type="text/css">
        *{padding:0;margin:0}
	body{width:100%;height:100%;background:rgba(0,0,0,.2);font-family:"Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif;color:#333;font-size:16px}
	.system-message{position:relative;width:280px;margin:0 auto;background:#fff;margin-top:300px}
	.system-message h2{font-weight: 100;padding:0 80px 0 20px;height:42px;line-height:42px;border-bottom:1px solid #eee;font-size:14px;color:#333;overflow:hidden;background-color:#F8F8F8;border-radius:2px 2px 0 0}
	.system-message h1{font-size:150px;font-weight:100;line-height:120px;margin-bottom:12px}
	.system-message .jump{padding:20px 0;background:#fff}
	.system-message .error,.system-message .success{line-height:1.8em;font-size:14px;padding:30px 20px 10px 20px}
	.system-message .detail{font-size:12px;line-height:20px;margin-top:12px;display:none}
	.system-message .jump a{height:28px;line-height:28px;padding:0 15px;border:1px solid #4898d5;background-color:#2e8ded;color:#fff;font-size:14px;border-radius:2px;font-weight:100;cursor:pointer;display:inline-block;text-decoration:none;position:relative;left:175px;top:0}
	.system-message .jump2 a{position:absolute;right:20px;top:5px;text-decoration:none;color:#333;font-size:22px}
    </style>
</head>
<body>
    <div class="system-message">
        <?php switch ($code) {?>
            <?php case 1:?>
            <h2>跳转提示 - 内容管理系统</h2>
            <p class="success"><?php echo(strip_tags($msg));?></p>
            <?php break;?>
            <?php case 0:?>
            <h2>跳转提示 - 内容管理系统</h2>
            <p class="error"><?php echo(strip_tags($msg));?></p>
            <?php break;?>
        <?php } ?>
        <p class="detail"></p>
        <p class="jump"><a id="href" href="<?php echo($url);?>">确定：<b id="wait"><?php echo($wait);?></b></a></p>
	<p class="jump2"><a id="href" href="<?php echo($url);?>">×</a></p>
    </div>
    <script type="text/javascript">
        (function(){
            var wait = document.getElementById('wait'),
                href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })();
    </script>
</body>
</html>
