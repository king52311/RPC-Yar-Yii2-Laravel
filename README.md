# RPC-Yar-Yii2-Laravel
use Yar for Yii2 and Laravel

### Installation 

### step 1.
#### 1) install php-yar extend：you can get the github source here https://github.com/laruence/yar.git

### YII framework

#### 1) step 1. 
* common\rpc  //RPC Lib Class
* frontend\controllers\ApiController    //Client Demo Controller
* frontend\controllers\RpcController    //Server Demo Controller
* frontend\models\demoModel             //Server Model Method for Client

#### 2) step 2.
* config\params.php 
```
'rpc' => [
        'host'=>[
            'demo1'=>'http://host1/rpc',
            'demo2'=>'http://host2/rpc',
            'demo3'=>'http://host3/rpc',
        ]
    ],
```
```
then you use : Yii::$app->params['rpc']['host']['demo1'];
```

#### 2) step 3.
* client request http://host/api/sync-video-download-info
* server response http://host/rpc

### laravel framework

#### 1) step 1.
* routes\rpc                             //RPC routes Class 
* app\Providers\RouteServiceProvider    //RPC routes used
* app\Rpc                               //RPC Lib Class
* app\Http\Controllers\ApiController   //Client Demo Controller
#### 2) step 2.
