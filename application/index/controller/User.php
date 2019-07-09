<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Member as MemberModel;
class User extends Common
{
    public function index()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $content = db('content');
			$member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            if ($m['status'] != 1) {
			    $this->error('亲！你迷路了');
		    } else {
				$uid = $m['userid'];
				$tptc = $content->where("uid = $uid")->order('id desc')->paginate(10);
				$this->assign('tptc', $tptc);
				return tptc();
			}
        }
    }
	public function comment()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $comment = db('comment');
            $member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            if ($m['status'] != 1) {
			    $this->error('亲！你迷路了');
		    } else {
				$uid = $m['userid'];
				$tptc = $comment->alias('c')->join('content f', 'f.id=c.fid')->field('c.*,f.title')->where("c.uid = $uid AND f.shows = 1")->order('c.id desc')->paginate(5);
				$this->assign('tptc', $tptc);
				return tptc();
			}
        }
    }
	public function message()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $comment = db('comment');
			$member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            if ($m['status'] != 1) {
			    $this->error('亲！你迷路了');
		    } else {
				$uid = $m['userid'];
				$member->where("userid = $uid")->update(['reply'=>0]);
				$tptc = $comment->alias('c')->join('content f', 'f.id=c.fid')->join('member e', 'e.userid=c.uid')->field('c.*,e.userid,e.username,f.title')->where("c.mid = $uid AND c.mes = 1")->order('c.id desc')->paginate(5);
				$this->assign('tptc', $tptc);
				return tptc();
			}
        }
    }
	public function messagedels()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $comment = db('comment');
			if($comment->where('id',input('id'))->update(['mes'=>0])){
				return tpta('清空成功');
			}else{
				return tptb('清空失败');
			}
        }
    }
	public function messagedelss()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $comment = db('comment');
			$member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            $uid = $m['userid'];
			if($comment->where("mid = $uid")->update(['mes'=>0])){
				return tpta('清空成功');
			}else{
				return tptb('清空失败');
			}
        }
    }
    public function home()
    {
        $id = input('id');
        if (empty($id)) {
            return $this->error('亲！你迷路了');
        } else {
            $member = new MemberModel();
            $tptm = $member->where("userid = $id AND status = 1")->find($id);
            if ($tptm) {
				$content = db('content');
                $tptc = $content->where("uid = $id AND shows = 1")->order('id desc')->limit(10)->select();
				$comment = db('comment');
                $tpte = $comment->alias('c')->join('content f', 'f.id=c.fid')->field('c.*,f.title')->where("c.uid = $id AND c.shows = 1")->order('c.id desc')->limit(5)->select();
				$this->assign(array('tptc' => $tptc, 'tpte' => $tpte, 'tptm' => $tptm));
				return tptc();
            } else {
                return $this->error('亲！你迷路了');
            }
        }
    }
    public function set()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            if ($m['status'] != 1) {
			    $this->error('亲！你迷路了');
		    } else {
				$uid = $m['userid'];
				$tptc = $member->find($uid);
				$this->assign('tptc', $tptc);
				return tptc();
			}
        }
    }
	public function sets()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            $uid = $m['userid'];
            if (request()->isPost()) {
				$data=[
				'userhome'=>input('userhome'),
				'description'=>input('description'),
				'usermail'=>input('usermail'),
				'userqq'=>input('userqq'),
				'username'=>input('username'),
				];
				$data['userid'] = $uid;
				if ($m['username'] == input('username')) {
					if ($member->edit($data)) {
						return tpta('修改成功');
					} else {
						return tptb('修改失败');
					}
			    } else {
					$n = $member->where('username', input('username'))->find();
					if(!$n){
						if ($member->edit($data)) {
							return tpta('修改成功');
						} else {
							return tptb('修改失败');
						}
					} else {
                        return tptb('该昵称已存在');
					}
				}
            }
			return tptc();
        }
    }
	public function setss()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            $uid = $m['userid'];
            if (request()->isPost()) {
                $data=[
    			'userxm'=>input('userxm'),
                'usersid'=>input('usersid'),
				'userzm'=>input('userzm'),
                ];
				$data['userid'] = $uid;
                if ($member->edit($data)) {
                    return tpta('修改成功');
                } else {
                    return tptb('修改失败');
                }
            }
			return tptc();
        }
    }
	public function headedit()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            $uid = $m['userid'];
            if (request()->isPost()) {
				$data['userhead'] = input('userhead');
				$data['userid'] = $uid;
                if ($member->edit($data)) {
                    return tpta('修改成功');
                } else {
                    return tptb('修改失败');
                }
            }
			return tptc();
        }
    }
	public function pass()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
            $member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            $uid = $m['userid'];
            if (request()->isPost()) {
                $password = input('password');
                $passwords = input('passwords');
                if ($password != $passwords) {
					return tptb('密码错误');
                }
				$data['userid'] = $uid;
                $data['password'] = md5($password);
                if ($member->edit($data)) {
					return tpta('修改成功');
                } else {
					return tptb('修改失败');
                }
            }
            return tptc();
        }
    }
	public function jqq()
    {
        if (!session('validate')) {
            $this->error('亲！请登录');
        } else {
			$member = new MemberModel();
			$m = $member->where('validate', session('validate'))->find();
            $data['userid'] = $m['userid'];
			$data['type'] = 0;
			$data['validate'] = substr(md5(time()), 8, 16);
			session('validate', substr(md5(time()), 8, 16));
			if ($member->edit($data)) {
				return tpta('解绑成功');
            } else {
				return tptb('解绑失败');
            }
        }
    }
}