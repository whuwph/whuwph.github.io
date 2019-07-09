<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Banner as BannerModel;
class Banner extends Common
{
    public function index()
    {
        $banner = new BannerModel();
        $tptc = $banner->order('id desc')->paginate(15);
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function add()
    {
        $banner = new BannerModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();
            if ($banner->add($data)) {
                return tpta('添加成功');
            } else {
                return tptb('添加失败');
            }
        }
        return tptc();
    }
    public function edit()
    {
        $banner = new BannerModel();
        if (request()->isPost()) {
            $data = input('post.');
            if ($banner->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
        $tptc = $banner->find(input('id'));
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function dels()
    {
        $banner = new BannerModel();
        if ($banner->destroy(input('post.id'))) {
            return tpta('删除成功');
        } else {
            return tptb('删除失败');
        }
    }
    public function delss()
    {
        $banner = new BannerModel();
        $params = input('post.');
        $ids = implode(',', $params['ids']);
        $result = $banner->batches('delete', $ids);
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
            $shows = db('banner')->field('shows')->where('id', $change)->find();
            $shows = $shows['shows'];
            if ($shows == 1) {
                db('banner')->where('id', $change)->update(['shows' => 0]);
                echo 1;
            } else {
                db('banner')->where('id', $change)->update(['shows' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
}