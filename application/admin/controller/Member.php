<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Member as MemberModel;
class Member extends Common
{
    public function index()
    {
        $member = new MemberModel();
        $ks = input('ks');
        $tptc = $member->order('userid desc')->where('username', 'like', '%' . $ks . '%')->paginate(15, false, $config = ['query' => array('ks' => $ks)]);
        $this->assign('tptc', $tptc);
        return tptc();
    }
	public function add()
    {
        $member = new MemberModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['usertime'] = time();
			$data['password'] = md5(input('password'));
			$data['point'] = 10;
			$data['validate'] = substr(md5(time()), 8, 16);
            if ($member->add($data)) {
                return tpta('添加成功');
            } else {
                return tptb('添加失败');
            }
        }
        return tptc();
    }
    public function edit()
    {
        $member = new MemberModel();
        if (request()->isPost()) {
            $data = input('post.');
            if ($member->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
        $tptc = $member->find(input('id'));
        $this->assign('tptc', $tptc);
        return tptc();
    }
	public function edits()
    {
        $member = new MemberModel();
        if (request()->isPost()) {
            $data = input('post.');
            $password = input('password');
            $passwords = input('passwords');
            if ($password != $passwords) {
                return tptb('密码错误');
            }
            $data['password'] = md5($password);
            if ($member->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
        $tptc = $member->find(input('id'));
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function dels()
    {
        $member = new MemberModel();
        if ($member->destroy(input('post.id'))) {
            return tpta('删除成功');
        } else {
            return tptb('删除失败');
        }
    }
    public function delss()
    {
        $member = new MemberModel();
        $params = input('post.');
        $ids = implode(',', $params['ids']);
        $result = $member->batches('delete', $ids);
        if ($result) {
            return tpta('批量删除成功');
        } else {
            return tptb('批量删除失败');
        }
    }
    public function changestatus()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $status = db('member')->field('status')->where('userid', $change)->find();
            $status = $status['status'];
            if ($status == 1) {
                db('member')->where('userid', $change)->update(['status' => 0]);
                echo 1;
            } else {
                db('member')->where('userid', $change)->update(['status' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    public function changeusereal()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $usereal = db('member')->field('usereal')->where('userid', $change)->find();
            $usereal = $usereal['usereal'];
            if ($usereal == 1) {
                db('member')->where('userid', $change)->update(['usereal' => 0]);
                echo 1;
            } else {
                db('member')->where('userid', $change)->update(['usereal' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
}