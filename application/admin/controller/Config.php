<?php
namespace app\admin\controller;

use think\Controller;
class Config extends Common
{
    public function index()
    {
        return tptc();
    }
    public function add()
    {
        $path = 'application/extra/web.php';
        $file = (include $path);
        $config = array('WEB_TIT' => input('WEB_TIT'), 'WEB_COM' => input('WEB_COM'), 'WEB_AUT' => input('WEB_AUT'), 'WEB_QQ' => input('WEB_QQ'), 'WEB_ICP' => input('WEB_ICP'), 'WEB_REG' => input('WEB_REG'), 'WEB_KEY' => input('WEB_KEY'), 'WEB_DES' => input('WEB_DES'), 'WEB_TAG' => input('WEB_TAG'), 'WEB_URL' => input('WEB_URL'), 'WEB_OPE' => input('WEB_OPE'), 'WEB_ADD' => input('WEB_ADD'), 'WEB_CNT' => input('WEB_CNT'), 'WEB_LOG' => input('WEB_LOG'), 'WEB_QQID' => input('WEB_QQID'), 'WEB_QQKEY' => input('WEB_QQKEY'), 'WEB_TPT' => input('WEB_TPT'), 'WEB_FTJ' => input('WEB_FTJ'), 'WEB_FJX' => input('WEB_FJX'), 'WEB_FYS' => input('WEB_FYS'), 'WEB_FTP' => input('WEB_FTP'), 'WEB_FHY' => input('WEB_FHY'), 'WEB_FDZ' => input('WEB_FDZ'), 'WEB_FHF' => input('WEB_FHF'), 'WEB_CNE' => input('WEB_CNE'), 'WEB_LOG' => input('WEB_LOG'), 'WEB_YAN' => input('WEB_YAN'));
        $res = array_merge($file, $config);
        $str = '<?php return [';
        foreach ($res as $key => $value) {
            $str .= '\'' . $key . '\'' . '=>' . '\'' . $value . '\'' . ',';
        }
        $str .= ']; ';
        if (file_put_contents($path, $str)) {
            return tpta('修改成功');
        } else {
            return tptb('修改失败');
        }
    }
}