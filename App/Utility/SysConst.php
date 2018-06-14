<?php

/**
 * Created by PhpStorm.
 * User: wlz
 * Date: 2018/6/14
 * Time: 10:56
 */
namespace App\Utility;

class SysConst
{
    /**     message code const  start  ***/

    const MSG_CODE_SUCCESS='0000';
    const MSG_CODE_ERROR='1000';

    /**     message code const  end   ***/


    const COOKIE_USER_SESSION_NAME = 'userSession';
    const COOKIE_USER_SESSION_TTL = 24*3600;//一天

}