<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Links as LinksModel;
class Links extends Common
{
    public function index()
    {
        $links = new LinksModel();
        $tptc = $links->order('id desc')->paginate(15);
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function add()
    {
        $links = new LinksModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();
            if ($links->add($data)) {
                return tpta('添加成功');
            } else {
                return tptb('添加失败');
            }
        }
        return tptc();
    }
    public function edit()
    {
        $links = new LinksModel();
        if (request()->isPost()) {
            $data = input('post.');
            if ($links->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
        $tptc = $links->find(input('id'));
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function dels()
    {
        $links = new LinksModel();
        if ($links->destroy(input('post.id'))) {
            return tpta('删除成功');
        } else {
            return tptb('删除失败');
        }
    }
    public function delss()
    {
        $links = new LinksModel();
        $params = input('post.');
        $ids = implode(',', $params['ids']);
        $result = $links->batches('delete', $ids);
        if ($result) {
            return tpta('批量删除成功');
        } else {
            return tptb('批量删除失败');
        }
    }
    public function changeshows()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $shows = db('links')->field('shows')->where('id', $change)->find();
            $shows = $shows['shows'];
            if ($shows == 1) {
                db('links')->where('id', $change)->update(['shows' => 0]);
                echo 1;
            } else {
                db('links')->where('id', $change)->update(['shows' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
}