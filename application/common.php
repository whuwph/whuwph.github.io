<?php
function tpta($str){
	return json(array('code'=>200,'msg'=>$str));
}
function tptb($str){
	return json(array('code'=>0,'msg'=>$str));
}

function tptc(){
	if(!isset($_SESSION['authcode'])) {
		$_SESSION['authcode']=true;
	}
	return tptcs();
}