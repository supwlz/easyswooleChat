<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2018/3/6
 * Time: 下午2:54
 */

namespace App\Sock\Controller;

use EasySwoole\Core\Socket\Response;
use EasySwoole\Core\Swoole\ServerManager;
use EasySwoole\Core\Swoole\Task\TaskManager;
use App\Common\WebsocketBase;

class WebSocket extends WebsocketBase
{


    function controllerNotFound()
    {
        $this->response()->write("controller  not found");
    }
    function actionNotFound(?string $actionName)
    {
        $this->response()->write("action call {$actionName} not found");
    }

    function hello()
    {
        $this->response()->write('call hello with arg:'.$this->request()->getArg('data'));

    }

    public function who(){
        $fd = $this->client()->getFd();
        $data = array(
            'fd'=>$fd,
            'detail'=>ServerManager::getInstance()->getServer()->connection_info($fd)
        );
        var_dump('websocket');
        $this->success('success',$data);
    }

    function delay()
    {
        $this->response()->write('this is delay action');
        $client = $this->client();
        //测试异步推送
        TaskManager::async(function ()use($client){
            sleep(1);
            Response::response($client,'this is async task res'.time());
        });
    }
}