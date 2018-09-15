<?php
/**
 * Created by PhpStorm.
 * User: sunday
 * Date: 2018/9/6
 * Time: 下午2:29
 */

namespace frontend\controllers;
use yii\web\Controller;
use common\rpc\RpcServer;
use Yii;
class RpcController extends Controller
{
    public function __construct($data)
    {
        RpcServer::getService();
    }

}