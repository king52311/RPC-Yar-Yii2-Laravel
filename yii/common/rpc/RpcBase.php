<?php
/**
 * Created by PhpStorm.
 * User: sunday
 * Date: 2018/9/6
 * Time: 下午4:27
 */

namespace common\rpc;


class  RpcBase
{

    public static $timeStampOut = 300;

    public static function encodeDataStr ( array $data)
    {
        return base64_encode(json_encode($data));
    }

    public static function decodeDataStr ($data)
    {
        return json_decode(base64_decode($data),true);
    }

    public static function createSign(array $data)
    {
        $stringA=implode('&',$data);
        $stringSignTemp=$stringA."&secretKey=".Yii::$app->params['rpc']['secretKey'];
        $sign=strtoupper(hash_hmac("sha256",$stringSignTemp,Yii::$app->params['rpc']['secretKey']));
        return $sign;
    }

    public static function verifySign(array $data)
    {

        $srcData = $data;
        unset($srcData['sign']);
        $srcData = [
            'dataStr='.$srcData['dataStr'],
            'timeStamp='.$srcData['timeStamp'],
            'nonceStr='.$srcData['nonceStr'],
        ];
        $sign = self::createSign($srcData);
        return ($sign==$data['sign'])?true:false;
    }

    public static function getRandStr()
    {
        $str="QWERTYUIOPASDFGHJKLZXCVBNM1234567890qwertyuiopasdfghjklzxcvbnm";
        str_shuffle($str);
        return substr(str_shuffle($str),10,16);
    }
}