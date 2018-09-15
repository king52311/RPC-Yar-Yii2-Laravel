<?php
/**
 * Created by PhpStorm.
 * User: sunday
 * Date: 2018/9/10
 * Time: 下午1:54
 */


Route::any('rpc', function (Request $request) {
    $server = new \App\rpc\RpcServer();
    $server->init($request);  //开启服务
});
