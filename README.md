# RPC-Yar-Yii2-Laravel
use Yar for Yii2 and Laravel

## RPC调用说明

### YII框架

#### 1) 布局文件
* common\rpc  RPC类文件
* frontend\controllers\ApiController    调用接口文件
* frontend\controllers\RpcController    服务端接口文件
* frontend\models\demoModel          调用model方法文件

#### 2) 调用规则
* client请求 http://host/api/sync-video-download-info
* server接收 http://host/rpc
