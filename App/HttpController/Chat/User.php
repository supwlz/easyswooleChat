<?php
/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2018/6/14
 * Time: 9:35
 */

namespace App\HttpController\Chat;
use App\Common\HttpBase;
use App\Utility\Bean,App\Utility\SysConst;
use App\Model\User\User as UserModel;
class User extends HttpBase
{

    public function onRequest($action):?bool
    {
        $token = $this->request()->getCookieParams(SysConst::COOKIE_USER_SESSION_NAME);
        $bean = new Bean([
            'session'=>$token
        ]);
        $model = new UserModel();
        $bean = $model->sessionExist($bean);
        if($bean){
            $this->who = $bean;
            return true;
        }else{
//            $this->writeJson(Status::CODE_UNAUTHORIZED,null,'权限验证失败');
            return false;
        }
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function register(){
        $this->fetch('chat/user/register');
    }

    public function doRegister(){
        // TODO: doregister user
    }

    public function login(){
        $this->fetch('chat/user/login');
    }
    public function dologin(){
        // TODO: do login user
    }


}