<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin as AdminModel;
class Admin extends Common
{
    public function index()
    {
        $admin = new AdminModel();
        $tptc = $admin->find(1);
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function edit()
    {
        $admin = new AdminModel();
        if (request()->isPost()) {
            $data = input('post.');
            $password = input('password');
            $passwords = input('passwords');
            if ($password != $passwords) {
                return tptb('密码错误');
            }
            $data['password'] = md5($password);
            if ($admin->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
    }
    public function edits()
    {
        $admin = new AdminModel();
        if (request()->isPost()) {
            $data = input('post.');
            if ($admin->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
    }
}