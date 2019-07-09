<?php
namespace app\admin\model;
use think\Model;
class Admin extends Model
{
	function edit($data){
		$result = $this->isUpdate(true)->allowField(true)->save($data);
		if($result){
			return true;
		}else{
			return false;
		}
	}
}