<?php
/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2018/6/13
 * Time: 13:43
 */

namespace App\HttpController\Test;
use App\Common\HttpBase;

class Html extends  HttpBase
{

    public function index()
    {
        // TODO: Implement index() method.
    }
    public function websocket(){
        $this->fetch('test/html/websocket');
    }
}