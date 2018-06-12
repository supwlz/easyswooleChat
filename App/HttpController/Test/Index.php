<?php
/**
 * Created by PhpStorm.
 * User: supwl
 * Date: 2018/6/11
 * Time: 21:18
 */

namespace App\HttpController\Test;


use App\Common\ViewController;
class Index extends ViewController
{

    public function index()
    {
        $this->response()->withHeader('Content-type', 'text/html;charset=utf-8');
        $this->response()->write('<div style="text-align: center"><h2>您现在看到的页面是test/index/index的输出</h2></div></br>');
    }
    public function exception(){
        new A();
       $this->success('ok');
    }
    public function view(){
        // Think-Template
        $this->fetch('index');      # 对应模板: Views/index.html

    }
}