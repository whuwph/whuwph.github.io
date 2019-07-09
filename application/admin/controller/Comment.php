<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Comment as CommentModel;
class Comment extends Common
{
    public function index()
    {
        $comment = new CommentModel();
        $tptc = $comment->alias('c')->join('content f', 'f.id=c.fid')->join('member m', 'm.userid=c.uid')->field('c.*,f.title,m.username')->order('c.id desc')->paginate(15);
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function edit()
    {
        $comment = new CommentModel();
        if (request()->isPost()) {
            $data = input('post.');
            $data['content'] = remove_xss(input('content'));
            if ($comment->edit($data)) {
                return tpta('修改成功');
            } else {
                return tptb('修改失败');
            }
        }
        $tptc = $comment->find(input('id'));
        $this->assign('tptc', $tptc);
        return tptc();
    }
    public function dels()
    {
        $comment = new CommentModel();
        if ($comment->destroy(input('post.id'))) {
            return tpta('删除成功');
        } else {
            return tptb('删除失败');
        }
    }
    public function delss()
    {
        $comment = new CommentModel();
        $params = input('post.');
        $ids = implode(',', $params['ids']);
        $result = $comment->batches('delete', $ids);
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
            $shows = db('comment')->field('shows')->where('id', $change)->find();
            $shows = $shows['shows'];
            if ($shows == 1) {
                db('comment')->where('id', $change)->update(['shows' => 0]);
                echo 1;
            } else {
                db('comment')->where('id', $change)->update(['shows' => 1]);
                echo 2;
            }
        } else {
            $this->error('非法操作');
        }
    }
}