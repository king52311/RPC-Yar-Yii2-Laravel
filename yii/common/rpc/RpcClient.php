<?php

/**
 * Created by PhpStorm.
 * User: sunday
 * Date: 2018/9/6
 * Time: 下午2:38
 */
namespace common\rpc;
use Yii;

class RpcClient extends RpcBase
{

    public static function getClient(array $condition)
    {
        if(!isset(Yii::$app->params['rpc']['host'][$condition['type']])){
            return 'please set params rpc_host';
        }

        error_reporting(E_ERROR);
        //ini_set("yar.debug",'on');
        ini_set("yar.timeout",60000);
        $defult = [
            'url'   => Yii::$app->params['rpc']['host'][$condition['type']], //服务器URL
            'class' => '', //class名称
        ];
        $condition = array_merge($defult,$condition);

        $data = [];
        $data['class'] = $condition['class'];
        $dataStr = self::encodeDataStr($data);

        $urlData = $tmpData = [
            'dataStr='.$dataStr,
            'timeStamp='.time(),
            'nonceStr='.self::getRandStr(),
        ];
        $urlData[] = 'sign='.self::createSign($tmpData);
        $url = "{$condition['url']}?".implode('&',$urlData);
        try{
            $object =  new \Yar_Client($url);
            $object->SetOpt(YAR_OPT_CONNECT_TIMEOUT, 1000);
            $object->SetOpt(YAR_OPT_TIMEOUT, 1000);
            Yii::info($url);
        }catch (\Exception $e){
            error_log($e->getMessage());
        }
        return $object;
    }

}