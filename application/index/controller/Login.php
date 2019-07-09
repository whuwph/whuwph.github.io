<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Member as MemberModel;
class Login extends Common
{

	public function index()
	{
		if (!session('validate')) {
			if (config('web.WEB_LOG') == 0 || config('web.WEB_LOG') == 2) {
				$this->error('已关闭登录');
			} else {
				$member = db('member');
				if (request()->isPost()) {
					if (config('web.WEB_YAN') == 1) {
						$this->check(input('code'));
					}
					$user = $member->where('usermail', input('usermail'))->where('status', 1)->find();
					if ($user) {
						if ($user['password'] == md5(input('password'))) {
							session('validate', $user['validate']);
							$data['usertimes'] = time();
							$data['userip'] = $_SERVER['REMOTE_ADDR'];
							$member->where('userid', $user['userid'])->setInc('count', 1);
							$member->where('userid', $user['userid'])->setInc('point', config('point.LOGIN_POINT'));
							return tpta('登录成功');
						} else {
							return tptb('密码错误');
						}
					} else {
						return tptb('账号错误');
					}
				}
			}
			return tptc();
		} else {
			header("Location: ../user/set.html");
		}
	}
	public function reg()
	{
		if (!session('validate')) {
			if (config('web.WEB_LOG') == 0 || config('web.WEB_LOG') == 2) {
				$this->error('已关闭注册');
			} else {
				$member = new MemberModel();
				if (request()->isPost()) {
					if (config('web.WEB_YAN') == 1) {
						$this->check(input('code'));
					}
					$password = input('password');
					$passwords = input('passwords');
					if ($password != $passwords) {
						return tptb('两次密码错误');
					}
					$mail = $member->where('usermail', input('usermail'))->find();
					if (!$mail) {
						$user = $member->where('username', input('username'))->find();
						if (!$user) {
							$data['username'] = input('username');
							$data['usermail'] = input('usermail');
							$data['usertime'] = time();
							$data['usertimes'] = time();
							$data['validate'] = substr(md5(time()), 8, 16);
							$data['count'] = 1;
							$data['sex'] = 1;
							$data['grades'] = 0;
							$data['status'] = 1;
							$data['type'] = 0;
							$data['point'] = config('point.REG_POINT');
							$data['userhead'] = '/uploads/20170401/default.png';
							$data['userip'] = $_SERVER['REMOTE_ADDR'];
							$data['password'] = md5($password);
							if ($member->add($data)) {
								return tpta('注册成功');
							} else {
								return tptb('注册失败');
							}
						} else {
							return tptb('该昵称已存在');
						}
					} else {
						return tptb('该邮箱已存在');
					}
				}
			}
			return tptc();
        } else {
			header("Location: ../user/set.html");
		}
	}
	public function qq()
	{
		return tptc();
	}
    public function loginqq()
    {
        $member = new MemberModel();
        if (request()->isPost()) {
			if (!session('validate')) {
                $user = $member->where('validate', substr(md5(input('openid')), 8, 16))->find();
				if ($user) {
					session('validate', $user['validate']);
					$data['userid'] = $user['userid'];
					$data['usertimes'] = time();
					$data['userip'] = $_SERVER['REMOTE_ADDR'];
					$member->where('userid', $user['userid'])->setInc('count', 1);
					$member->where('userid', $user['userid'])->setInc('point', config('point.LOGIN_POINT'));
					$member->edit($data);
				} else {
					session('validate', substr(md5(input('openid')), 8, 16));
					$data['username'] = input('username');
					$data['openid'] = input('openid');
					$data['usertime'] = time();
					$data['usertimes'] = time();
					$data['count'] = 1;
					if (input('sex') == '男') {
						$data['sex'] = 1;
					} else {
						$data['sex'] = 0;
					}
					$data['grades'] = 0;
					$data['status'] = 1;
					$data['type'] = 1;
					$data['point'] = config('point.REG_POINT');
					$data['userip'] = $_SERVER['REMOTE_ADDR'];
					$data['validate'] = substr(md5(input('openid')), 8, 16);
					$data['userhead'] = str_replace("http","https",input('userhead'));
					$member->add($data);
				}
				return tpta('登录成功');
            } else {
				$s = $member->where('validate', substr(md5(input('openid')), 8, 16))->find();
				if ($s) {
                    return tptb('此QQ已绑定过帐号');
				} else {
					$m = $member->where('validate', session('validate'))->find();
					$data['userid'] = $m['userid'];
					$data['type'] = 1;
					$data['validate'] = substr(md5(input('openid')), 8, 16);
					session('validate', substr(md5(input('openid')), 8, 16));
					$member->edit($data);
					return tpta('绑定成功');
				}
			}
        }
    }
	public function check($code = '')
    {
        if (!captcha_check($code)) {
            $this->error('验证码错误');
        } else {
            return true;
        }
    }
    public function logout()
    {
        session("validate", NULL);
        return tpta('退出成功');
        return NULL;
    }
}