<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;

/**
 * Class Index
 * @package App\HttpController
 */
class Index extends Controller
{
    /**
     * 首页方法
     * @author : evalor <master@evalor.cn>
     */
    function index()
    {
        $this->response()->withHeader('Content-type', 'text/html;charset=utf-8');
        $this->response()->write('<div style="text-align: center"><h2>您现在看到的页面是默认的 Index 控制器的输出</h2></div></br>');
    }
}