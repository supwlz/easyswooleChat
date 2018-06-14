<?php
/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2018/6/14
 * Time: 17:06
 */

namespace App\Utility;

use EasySwoole\Config;

class Common
{

    public static function encryptPwd($pwd){
        // 获得数据库配置
        $userPwdSalt = Config::getInstance()->getConf('salt.user_pwd');
        return md5($userPwdSalt.$pwd);
    }

}