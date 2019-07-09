<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Content as ContentModel;
class Content extends Common
{
    public function index()
    {
        $content = new ContentModel();
        $ks = input('ks');
        $tptc = $content->alias('f')->join('category c', 'c.id=f.tid')->field('f.*,c.id as cid,c.name')->order('f.id desc')->where('title', 'like', '%' . $ks . '%')->paginate(15, false, $config = ['query' => array('ks' => $ks)]);
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function add()
    {
        $content = new ContentModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['time'] = time();
            $data['view'] = 1;
            $data['uid'] = 1;
            $data['content'] = remove_xss(input('content'));
            if ($content->add($data)) {
                return tpta('添加成功');
            } else {
                return tptb('添加失败');
            }
        }
        $category = db('category');
        $tptc = $category->where("tid != 0")->select();
        $tags = config('web.WEB_TAG');
        $tagss = explode(',', $tags);
        $this->assign(array('tptc' => $tptc, 'tagss' => $tagss));
        return tptc();
    }
    public function edit()
    {
        $content = new ContentModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['content'] = remove_xss(input('content'));
            if ($content->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
        $category = db('category');
        $tptc = $content->find(input('id'));
        $tptcs = $category->where("tid != 0")->select();
        $tags = config('web.WEB_TAG');
        $tagss = explode(',', $tags);
        $this->assign(array('tptc' => $tptc, 'tptcs' => $tptcs, 'tagss' => $tagss));
        return tptc();
    }
    public function dels()
    {
        $content = new ContentModel();
        if ($content->destroy(input('post.id'))) {
            return tpta('删除成功');
        } else {
            return tptb('删除失败');
        }
    }
    public function delss()
    {
        $content = new ContentModel();
        $params = input('post.');
        $ids = implode(',', $params['ids']);
        $result = $content->batches('delete', $ids);
        if ($result) {
            return tpta('批量删除成功');
        } else {
            return tptb('批量删除失败');
        }
    }
    public function changechoice()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $choice = db('content')->field('choice')->where('id', $change)->find();
            $choice = $choice['choice'];
            if ($choice == 1) {
                db('content')->where('id', $change)->update(['choice' => 0]);
                echo 1;
            } else {
                db('content')->where('id', $change)->update(['choice' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    public function changesettop()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $settop = db('content')->field('settop')->where('id', $change)->find();
            $settop = $settop['settop'];
            if ($settop == 1) {
                db('content')->where('id', $change)->update(['settop' => 0]);
                echo 1;
            } else {
                db('content')->where('id', $change)->update(['settop' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
    public function changeshows()
    {
        if (request()->isAjax()) {
            $change = input('change');
            $shows = db('content')->field('shows')->where('id', $change)->find();
            $shows = $shows['shows'];
            if ($shows == 1) {
                db('content')->where('id', $change)->update(['shows' => 0]);
                echo 1;
            } else {
                db('content')->where('id', $change)->update(['shows' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
}