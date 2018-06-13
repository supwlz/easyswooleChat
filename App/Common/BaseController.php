<?php
/**
 * Created by PhpStorm.
 * User: supwl
 * Date: 2018/6/11
 * Time: 22:39
 */

namespace App\Common;
use EasySwoole\Core\Socket\AbstractInterface\WebSocketController;
class BaseController extends  WebSocketController
{
    const BOOLEN_SUCCESS=1;
    const BOOLEN_ERROR=0;
    const SUCCESS = '0000';
    const SYSTEM_ERROR_DEFAULT = '5000';
    public function index()
    {
        // TODO: Implement index() method.
    }
    public  function success($msg,$data=[],$code=self::SUCCESS){
        return $this->jreturn(self::BOOLEN_SUCCESS,$msg,$data,$code);
    }
    public  function error($msg,$data=[],$code=self::SYSTEM_ERROR_DEFAULT){
        return $this->jreturn(self::BOOLEN_ERROR,$msg,$data,$code);
    }
    private  function jreturn($boolen,$msg,$data,$code){
        $arr = array(
            'boolen'=>$boolen,
            'code'=>$code,
            'msg'=>$msg,
            'data'=>$data);
        return $this->response()->write(json_encode($arr, JSON_UNESCAPED_UNICODE));
    }



}