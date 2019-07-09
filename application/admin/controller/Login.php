<?php
namespace app\admin\controller;

use think\Controller;
class Login extends Controller
{
    public function index()
    {
        $admin = db('admin');
        if (request()->isPost()) {
            if (config('web.WEB_YAN') == 1) {
				$this->check(input('code'));
			}
			$data = input('post.');
            $user = $admin->where('adminname', $data['adminname'])->find();
            if ($user) {
                if ($user['password'] == md5($data['password'])) {
                    if ($user['kouling'] == $data['kouling']) {
                        session('kouling', md5($user['kouling']));
                        session('adminname', $user['adminname']);
                        session('adminhead', $user['adminhead']);
                        session('validate', $user['validate']);
						session('password', md5(md5($data['password'])));
                        return tpta('登录成功');
                    } else {
                        return tptb('口令错误');
                    }
                } else {
                    return tptb('密码错误');
                }
            } else {
                return tptb('账号错误');
            }
        }
        return tptc();
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
        session("kouling", NULL);
        session("adminname", NULL);
        session("adminhead", NULL);
        session("validate", NULL);
		session("password", NULL);
        return tpta('退出成功');
        return NULL;
    }
}