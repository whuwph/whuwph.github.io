<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Content as ContentModel;
class Content extends Common
{
    public function add()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
			$member = db('member');
			$webadd = 1;
			$m = $member->where('validate', session('validate'))->find();
			if ($webadd != config('web.WEB_ADD') || $webadd != $m['status']) {
				$this->error('已关闭发布内容');
			} else {
				$content = new ContentModel();
				if (request()->isPost()) {
					$data = input('post.');
					$data['time'] = time();
					$data['shows'] = config('web.WEB_OPE');
					$data['view'] = 1;
					$data['uid'] = $m['userid'];
					$data['description'] = content_zh(remove_xss(input('content')),0,70);
					$data['content'] = remove_xss(input('content'));
					$data['pic'] = datapic($data['content'],240,160,1);
					$member->where('userid', $m['userid'])->setInc('point', config('point.ADD_POINT'));
					if ($content->add($data)) {
						if ($webadd != config('web.WEB_OPE')) {
						    return tpta('发布成功，等待审核');
						} else {
							return tpta('发布成功');
						}
					} else {
						return tptb('发布失败');
					}
				}
				$category = db('category');
				$tptc = $category->where("tid != 0 AND shows = 1")->select();
				$tags = config('web.WEB_TAG');
				$tagss = explode(',', $tags);
				$this->assign(array('tptc' => $tptc, 'tagss' => $tagss));
				return tptc();
			}
        }
    }
    public function edit()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $id = input('id');
			$m = db('member')->where('validate', session('validate'))->find();
            $uid = $m['userid'];
            $content = new ContentModel();
            $a = $content->find($id);
            if (empty($id) || $a == null || $a['uid'] != $uid) {
                $this->error('亲！您迷路了');
            } else {
				$webadd = 1;
				if ($webadd != config('web.WEB_ADD') || $webadd != $m['status']) {
					$this->error('已关闭修改内容');
				} else {
					if (request()->isPost()) {
						$data=[
						'title'=>input('title'),
						'tid'=>input('tid'),
						'keywords'=>input('keywords'),
						];
						$data['id'] = $id;
						$data['description'] = content_zh(remove_xss(input('content')),0,70);
						$data['content'] = remove_xss(input('content'));
						$data['pic'] = datapic($data['content'],240,160,1);
						$data['shows'] = config('web.WEB_OPE');
						if ($content->edit($data)) {
							if ($webadd != config('web.WEB_OPE')) {
						        return tpta('修改成功，等待审核');
							} else {
								return tpta('修改成功');
							}
						} else {
							return tptb('修改失败');
						}
					}
					$category = db('category');
					$tptc = $content->find($id);
					$tptcs = $category->where("tid != 0 AND shows = 1")->select();
					$tags = config('web.WEB_TAG');
					$tagss = explode(',', $tags);
					$this->assign(array('tptc' => $tptc, 'tptcs' => $tptcs, 'tagss' => $tagss));
					return tptc();
				}
            }
        }
    }
    
}