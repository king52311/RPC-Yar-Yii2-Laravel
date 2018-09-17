<?php

/**
 * Created by PhpStorm.
 * User: sunday
 * Date: 2018/9/6
 * Time: 下午2:38
 */

namespace App\rpc;

class RpcClient extends RpcBase
{

    public static function getClient(array $condition)
    {
        if (config('rpc.rpc_host.demo1')) {
            return 'please set params rpc_host';
        }

        error_reporting(E_ERROR);
        //ini_set("yar.debug",'on');
        $defult = [
            'url' => config('rpc.rpc_host.demo1'), //服务器URL
            'class' => '', //class名称
        ];
        $condition = array_merge($defult, $condition);

        $data = [];
        $data['class'] = $condition['class'];
        $dataStr = self::encodeDataStr($data);

        $urlData = $tmpData = [
            'dataStr=' . $dataStr,
            'timeStamp=' . time(),
            'nonceStr=' . self::getRandStr(),
        ];
        $urlData[] = 'sign=' . self::createSign($tmpData);
        $url = "{$condition['url']}?" . implode('&', $urlData);
        $object = new \Yar_Client($url);
        return $object;
    }

}