<?php
/**
 * Created by PhpStorm.
 * User: sunday
 * Date: 2018/9/6
 * Time: 上午10:36
 */

namespace frontend\controllers;


use common\rpc\RpcClient;
use yii\web\Controller;

class ApiController extends Controller
{
    /**
     * 
     * @param $drama_id
     * @param $material_id
     * @param $platform_id
     * @param $video_url
     */
    public function actionSyncVideoDownloadInfo($drama_id,$material_id,$platform_id,$video_url)
    {
        var_dump($this->getMedaInfo($drama_id,$material_id,$platform_id));exit;
        var_dump($drama_id,$material_id,$platform_id,$video_url);exit;
    }

    private function getMedaInfo($drama_id,$material_id,$platform_id)
    {
        $condition = ['class'=>'\frontend\models\demoModel'];
        $demoModel = RpcClient::getClient($condition);
        return $demoModel->add($drama_id,$material_id);
    }

}