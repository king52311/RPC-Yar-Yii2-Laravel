<?php
/**
 * Created by PhpStorm.
 * User: sunday
 * Date: 2018/9/6
 * Time: 下午4:28
 */

namespace App\rpc;

use Illuminate\Support\Facades\Input;

class RpcServer extends RpcBase
{
    public function init($request)
    {
        $requestData = Input::get();
        if ($requestData['timeStamp'] + self::$timeStampOut < time()) {
            return false;
        }

        if (!self::verifySign($requestData)) {
            return false;
        }


        $data = self::decodeDataStr($requestData['dataStr']);
        try {
            $server = new \Yar_Server(new $data['class']());
            return $server->handle();
        } catch (Exception $e) {
            return;
            $e->getMessage();
        }
    }
}