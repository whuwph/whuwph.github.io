<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"./application/admin\view\member_index.html";i:1504407094;s:42:"./application/admin\view\index_header.html";i:1514021724;s:42:"./application/admin\view\index_footer.html";i:1504421378;}*/ ?>
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
.layui-form-checkbox {height: 22px;line-height: 20px;margin-right: 0px;padding-right: 20px;}
.layui-form-checkbox i {right: 3px;width: 20px;font-size: 16px;top: 2px;}
</style>
<div class="fly-panel fly-panel-user">
<div class="tpt—admin">
<div class="tpt—btn" style="float: left;margin: 0 20px 0 0">
<a href="<?php echo url('member/add'); ?>"><i class="layui-icon">&#xe61f;</i> 添加会员</a>
</div>

<div style="float: left;">
<form class="layui-form" action="" method="get">
<input placeholder="输入关键字" name="ks" value="<?php echo input('ks');?>" type="text" class="layui-input" style="float: left;margin-right: 10px;width: 240px;">
<button class="layui-btn" style="float: left;" value="查询" type="submit">查询</button>
</form>
</div>

<form class="layui-form">
<table width="100%">
<tr>
<th width="5%" align="center"><input type="checkbox" name="checkAll" lay-filter="checkAll"></th>
<th width="5%" align="center">ID</th>
<th width="10%" align="center">昵称</th>
<th width="10%" align="center">积分</th>
<th width="10%" align="center">头像</th>
<th width="10%" align="center">邮箱</th>
<th width="10%" align="center">时间</th>
<th width="10%" align="center">登录验证</th>
<th width="10%" align="center">实名认证</th>
<th width="10%" align="center">操作验证</th>
<th width="10%" align="center">基本操作</th>
</tr>
<?php if(is_array($tptc) || $tptc instanceof \think\Collection || $tptc instanceof \think\Paginator): $i = 0; $__LIST__ = $tptc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<tr>
<td align="center"><input type="checkbox" name="ids[<?php echo $vo['userid']; ?>]" lay-filter="checkOne" value="<?php echo $vo['userid']; ?>"></td>
<td align="center"><?php echo $vo['userid']; ?></td>
<td align="center"><?php echo $vo['username']; ?></td>
<td align="center"><?php echo $vo['point']; ?></td>
<td align="center"><?php if($vo['userhead'] != ''): ?><img src="__ROOT__<?php echo $vo['userhead']; ?>" height="30"><?php else: ?>暂无头像<?php endif; ?></td>
<td align="center"><?php if($vo['usermail'] != ''): ?><?php echo $vo['usermail']; else: ?>邮箱未填<?php endif; ?></td>
<td align="center"><?php echo date("Y-m-d",$vo['usertime']); ?></td>
<td align="center"><?php echo $vo['validate']; ?></td>
<td align="center">
<a change="<?php echo $vo['userid']; ?>" onclick="changeusereal(this);" <?php if($vo['usereal'] == 1): ?>class="layui-unselect layui-form-switch layui-form-onswitch"<?php else: ?>class="layui-unselect layui-form-switch"<?php endif; ?>>
<em>认证</em><i></i>
</a>
</td>
<td align="center">
<a change="<?php echo $vo['userid']; ?>" onclick="changestatus(this);" <?php if($vo['status'] == 1): ?>class="layui-unselect layui-form-switch layui-form-onswitch"<?php else: ?>class="layui-unselect layui-form-switch"<?php endif; ?>>
<em>验证</em><i></i>
</a>
</td>
<td align="center">
<a class="layui-btn layui-btn-mini layui-btn-warm" href="<?php echo url('member/edit',array('id'=>$vo['userid'])); ?>">修改</a> <a class="layui-btn layui-btn-mini layui-btn-danger del_btn" member-id="<?php echo $vo['userid']; ?>" title="删除" nickname="<?php echo $vo['username']; ?>">删除</a>
</td>
</tr>
<?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="layui-form-item">
<div style="margin-top: 20px;float: left;">
<button class="layui-btn" lay-submit lay-filter="delete">删除选中</button>
</div>
<div class="pages" style="float: right;"><?php echo $tptc->render(); ?></div>
</div>
</form>
<script>
function changestatus(o){
  var change=$(o).attr("change");
  $.ajax({
	  type:"post",
	  dataType:"json",
      data:{change:change},
	  url:"<?php echo url('member/changestatus'); ?>",
	  success:function(data){
		  if(data == 1){
			  $(o).attr("class","layui-unselect layui-form-switch");
	      }else{
			  $(o).attr("class","layui-unselect layui-form-switch layui-form-onswitch");
	      }
	  }
  });
}
function changeusereal(o){
  var change=$(o).attr("change");
  $.ajax({
	  type:"post",
	  dataType:"json",
      data:{change:change},
	  url:"<?php echo url('member/changeusereal'); ?>",
	  success:function(data){
		  if(data == 1){
			  $(o).attr("class","layui-unselect layui-form-switch");
	      }else{
			  $(o).attr("class","layui-unselect layui-form-switch layui-form-onswitch");
	      }
	  }
  });
}
</script>
<script>
layui.use('form',function(){
  var form = layui.form,
  jq = layui.jquery;

  jq('.del_btn').click(function(){
    var name = jq(this).attr('nickname');
    var id = jq(this).attr('member-id');
    layer.confirm('确定删除【'+name+'】?', function(index){
      loading = layer.load(2, {
        shade: [0.2,'#000']
      });
      jq.post('<?php echo url("member/dels"); ?>',{'id':id},function(data){
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

  form.on('checkbox(checkAll)', function(data){
    if(data.elem.checked){
      jq("input[type='checkbox']").prop('checked',true);
    }else{
      jq("input[type='checkbox']").prop('checked',false);
    }
    form.render('checkbox');
  });  

  form.on('checkbox(checkOne)', function(data){
    var is_check = true;
    if(data.elem.checked){
      jq("input[lay-filter='checkOne']").each(function(){
        if(!jq(this).prop('checked')){ is_check = false; }
      });
      if(is_check){
        jq("input[lay-filter='checkAll']").prop('checked',true);
      }
    }else{
      jq("input[lay-filter='checkAll']").prop('checked',false);
    } 
    form.render('checkbox');
  });

  form.on('submit(delete)', function(data){
    var is_check = false;
    jq("input[lay-filter='checkOne']").each(function(){
      if(jq(this).prop('checked')){ is_check = true; }
    });
    if(!is_check){
      layer.msg('请选择数据', {icon: 2,anim: 6,time: 1000});
      return false;
    }
    layer.confirm('确定批量删除?', function(index){
      loading = layer.load(2, {
        shade: [0.2,'#000']
      });
      var param = data.field;
      jq.post('<?php echo url("member/delss"); ?>',param,function(data){
        if(data.code == 200){
          layer.close(loading);
          layer.msg(data.msg, {icon: 1, time: 1000}, function(){
            location.reload();
          });
        }else{
          layer.close(loading);
          layer.msg(data.msg, {icon: 2,anim: 6, time: 1000});
        }
      });
    });
    return false;
  });

})
</script>
</div>
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