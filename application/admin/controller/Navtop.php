<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Navtop as NavtopModel;
class Navtop extends Common
{
    protected $beforeActionList = ['delsoncate' => ['only' => 'dels']];
    public function index()
    {
        $navtop = new NavtopModel();
        $tptc = $navtop->catetree();
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function add()
    {
        $navtop = new NavtopModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();
            if ($navtop->add($data)) {
                return tpta('添加成功');
            } else {
                return tptb('添加失败');
            }
        }
        $tptc = $navtop->catetree();
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function edit()
    {
        $navtop = new NavtopModel();
        if (request()->isPost()) {
            $data = input('post.');
            if ($navtop->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
        $tptc = $navtop->find(input('id'));
        $tptcs = $navtop->catetree();
        $this->assign(array('tptcs' => $tptcs, 'tptc' => $tptc));
        return tptc();
    }
    public function dels()
    {
        $dels = db('navtop')->delete(input('id'));
        if ($dels) {
            return tpta('删除成功');
        } else {
            return tptb('删除失败');
        }
    }
    public function delsoncate()
    {
        $navid = input('id');
        $navtop = new NavtopModel();
        $sonids = $navtop->getchilrenid($navid);
        if ($sonids) {
            db('navtop')->delete($sonids);
        }
    }
    public function changeshows()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $shows = db('navtop')->field('shows')->where('id', $change)->find();
            $shows = $shows['shows'];
            if ($shows == 1) {
                db('navtop')->where('id', $change)->update(['shows' => 0]);
                echo 1;
            } else {
                db('navtop')->where('id', $change)->update(['shows' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    public function changeblank()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $blank = db('navtop')->field('blank')->where('id', $change)->find();
            $blank = $blank['blank'];
            if ($blank == 1) {
                db('navtop')->where('id', $change)->update(['blank' => 0]);
                echo 1;
            } else {
                db('navtop')->where('id', $change)->update(['blank' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
	public function changesurl()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $surl = db('navtop')->field('surl')->where('id', $change)->find();
            $surl = $surl['surl'];
            if ($surl == 1) {
                db('navtop')->where('id', $change)->update(['surl' => 0]);
                echo 1;
            } else {
                db('navtop')->where('id', $change)->update(['surl' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
}