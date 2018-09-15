<?php
/**
 * Created by PhpStorm.
 * User: sunday
 * Date: 2018/6/26
 * Time: 下午6:14
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use App\Rpc\RpcClient;
use Illuminate\Support\Facades\Input;

class ApiController extends BaseController
{
    public function demo()
    {
        $request = Input::get();
        $condition = [
            'type' => 'demo',
            'class' => '\frontend\models\demoModel',
        ];
        $demoModel = RpcClient::getClient($condition);
        return $demoModel->add(intval($request['a']), intval($request['b']));
    }

    public function test()
    {
        $request = Input::get();
        $condition = [
            'type' => 'test',
            'class' => '\frontend\models\Log',
        ];
        $demoModel = RpcClient::getClient($condition);
        return $demoModel->loglist();
    }
}