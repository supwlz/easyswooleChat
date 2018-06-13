<?php
/**
 * Created by PhpStorm.
 * User: supwl
 * Date: 2018/6/13
 * Time: 22:30
 */

namespace App\Common;
use EasySwoole\Core\Socket\AbstractInterface\WebSocketController;

abstract class WebsocketBase extends  WebSocketController
{
    const MSG_CODE_SUCCESS='0000';
    const MSG_CODE_ERROR='1000';
    public  function success($msg,$data=[],$msg_code=self::MSG_CODE_SUCCESS){
        return $this->writeJson($msg_code ,$msg ,$data);
    }
    public  function error($msg,$data=[],$msg_code=self::MSG_CODE_ERROR){
        return $this->writeJson($msg_code ,$msg ,$data);
    }
    private function writeJson(string $msg_code,string $msg , $data = []){
        $result = array(
            'msg_code'=>$msg_code,
            'msg'=>$msg,
            'data'=>$data
        );
        $this->response()->write(json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
    }

}