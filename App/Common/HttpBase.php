<?php

namespace App\Common;

use EasySwoole\Config;
use EasySwoole\Core\Http\AbstractInterface\Controller;
use EasySwoole\Core\Http\Request;
use EasySwoole\Core\Http\Response;
use think\Template;
use EasySwoole\Core\Http\Message\Status;
use App\Utility\SysConst;

abstract class HttpBase extends Controller
{
    protected $view;


    /**
     * 初始化模板引擎
     * ViewController constructor.
     * @param string   $actionName
     * @param Request  $request
     * @param Response $response
     */
    function __construct(string $actionName, Request $request, Response $response)
    {
        $this->view = new Template();
        $tempPath   = Config::getInstance()->getConf('TEMP_DIR');     # 临时文件目录
        $this->view->config([
            'view_path'  => EASYSWOOLE_ROOT . '/Views/',              # 模板文件目录
            'cache_path' => "{$tempPath}/templates_c/",               # 模板编译目录
        ]);

        parent::__construct($actionName, $request, $response);
    }

    protected function actionNotFound($action): void
    {
        $this->error('action '.$action.' not found',[],SysConst::MSG_CODE_ERROR,Status::CODE_NOT_FOUND);
    }

    /**
     * 输出模板到页面
     * @param  string|null $template 模板文件
     * @param array        $vars     模板变量值
     * @param array        $config   额外的渲染配置
     * @author : evalor <master@evalor.cn>
     */
    function fetch($template, $vars = [], $config = [])
    {
        ob_start();
        $this->view->fetch($template, $vars, $config);
        $content = ob_get_clean();
        $this->response()->write($content);
    }
    public  function success($msg,$data=[],$msg_code=SysConst::MSG_CODE_SUCCESS,$http_code=Status::CODE_OK){
        return $this->jsonReturn(1,$msg,$data ,$msg_code,$http_code);
    }
    public  function error($msg,$data=[],$msg_code=SysConst::MSG_CODE_ERROR,$http_code= Status::CODE_NOT_FOUND){
        return $this->jsonReturn(0,$msg,$data ,$msg_code,$http_code);
    }

    private function jsonReturn($boolen,$msg,$data ,$msg_code,$http_code)
    {
        if(!$this->response()->isEndResponse()){
            $data = Array(
                'boolen'=>$boolen,
                "msg"=>$msg,
                "msg_code"=>$msg_code,
                "data"=>$data,
            );
            $this->response()->write(json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
            $this->response()->withHeader('Content-type','application/json;charset=utf-8');
            $this->response()->withStatus($http_code);
            return true;
        }else{
            trigger_error("response has end");
            return false;
        }
    }
}