<?php
/**
 * Created by PhpStorm.
 * User: sunday
 * Date: 2018/9/6
 * Time: 下午4:28
 */

namespace common\rpc;
use Yii;

class RpcServer extends RpcBase
{
    public static function getService()
    {
        $requestData = Yii::$app->request->get();

        if($requestData['timeStamp']+self::$timeStampOut < time()){
            return false;
        }

        if(!self::verifySign($requestData)){
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