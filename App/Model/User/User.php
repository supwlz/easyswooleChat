<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/3/3
 * Time: 下午6:47
 */

namespace App\Model\User;

use App\Model\Base;
use EasySwoole\Core\Utility\Random;
use App\Utility\Common;

class User extends Base
{
    protected $table = 'user_list';


    function login($userName,$password)
    {

        $md5_pwd = Common::encryptPwd($password);

        $this->
        $info = $this->dbConnector()->where('userId',$bean->getUserId())
            ->where('password',$bean->getPassword())->get($this->table);
        if(empty($info)){
            $session = md5(time().Random::randStr(6));
            $this->updateByAccount($bean,[
                'session'=>$session
            ]);
            $bean->setSession($session);
            return $bean;
        }else{
            return null;
        }
    }

    function sessionExist(Bean $bean):?Bean
    {
        $data = $this->dbConnector()->where('session',$bean->getSession())->getOne($this->table);
        if($data){
            return new Bean($data);
        }else{
            return null;
        }
    }
}