<?php
namespace App;
use EasySwoole\Core\Http\AbstractInterface\ExceptionHandlerInterface;
use EasySwoole\Core\Http\Request;
use EasySwoole\Core\Http\Response;
use EasySwoole\Core\Http\Message\Status;
use App\Common\ViewController;
/**
 * Created by PhpStorm.
 * User: supwl
 * Date: 2018/6/11
 * Time: 21:43
 */
class ExceptionHandler implements ExceptionHandlerInterface
{

    public function handle(\Throwable $throwable,Request $request,Response $response)
    {
        $response->withHeader('Content-type', 'text/html;charset=utf-8');
        $response->withStatus(Status::CODE_INTERNAL_SERVER_ERROR);
        $response->write('<div style="text-align: center"><h2>'.$throwable->getMessage().'</h2></div></br>');
        // TODO: Implement handle() method.
    }

}