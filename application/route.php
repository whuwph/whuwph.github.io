<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    'home/:id' => ['index/user/home', ['id' => '\d+']],
    'thread/:id' => ['index/index/thread', ['id' => '\d+']],
    'view/:id' => ['index/index/view', ['id' => '\d+']],
    'edit/:id' => ['index/content/edit', ['id' => '\d+']],
    'edits/:id' => ['index/comment/edit', ['id' => '\d+']],
	'choice' => ['index/index/choice',['ext'=>'html']],
	'search' => ['index/index/search', ['ext'=>'html']],
	'tags' => ['index/index/tags', ['ext'=>'html']],
	'add' => ['index/content/add',['ext'=>'html']],
	'user/set' => ['index/user/set',['ext'=>'html']],
	'user/comment' => ['index/user/comment',['ext'=>'html']],
	'user/message' => ['index/user/message',['ext'=>'html']],
	'user/index' => ['index/user/index',['ext'=>'html']],
	'user/qq' => ['index/login/qq',['ext'=>'html']],
	'user/login' => ['index/login/index',['ext'=>'html']],
	'user/reg' => ['index/login/reg',['ext'=>'html']],
];