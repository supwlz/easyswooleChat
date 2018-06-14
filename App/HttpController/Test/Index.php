<?php
/**
 * Created by PhpStorm.
 * User: supwl
 * Date: 2018/6/11
 * Time: 21:18
 */

namespace App\HttpController\Test;

use EasySwoole\Core\Swoole\ServerManager;
use App\Common\HttpBase;
use App\Model\User\User as UserModel;
use App\Utility\SysConst;
use EasySwoole\Core\Http\Message\Status;

class Index extends HttpBase
{

    public function test(){
        $this->error('success',UserModel::all());
    }

    public function index()
    {
        $this->response()->withHeader('Content-type', 'text/html;charset=utf-8');
        $this->response()->write('<div style="text-align: center"><h2>您现在看到的页面是test/index/index的输出</h2></div></br>');
    }
    public function exception(){
        new A();
       $this->writeJson('ok');
    }

    public function swoole(){
        $this->success(phpversion('swoole'));
    }
    /*
     * 请调用who，获取fd
     * http://ip:9501/push/index.html?fd=xxxx
     */
    function push()
    {
        $fd = intval($this->request()->getRequestParam('fd'));
        $info = ServerManager::getInstance()->getServer()->connection_info($fd);
        if(is_array($info)){
            ServerManager::getInstance()->getServer()->push($fd,'push in http at '.time());
        }else{
            $this->response()->write("fd {$fd} not exist");
        }
    }


}