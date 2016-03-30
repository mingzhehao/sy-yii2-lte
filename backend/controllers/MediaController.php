<?php

namespace backend\controllers;

use Yii;
use common\models\Upload;
use common\models\UploadSearch;
use backend\controllers\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\helpers\FileHelper;

/**
 * MediaController implements the CRUD actions for Upload model.
 */
class MediaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionUpload()
    {
        /** 通过传递过来的type进行getInstanceByName获取数据
         ** type => image 
         ** type => file 
         **/
        $type = Yii::$app->request->get('type');
        $imageFile = UploadedFile::getInstanceByName("$type");
        $directory = \Yii::getAlias('@backend/web/upload/temp') . DIRECTORY_SEPARATOR . Yii::$app->session->id . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            @mkdir($directory, 0777, true);
            @chmod($directory, 0777);
        }
        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = '/upload/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
                return Json::encode([
                    'files' => [[
                        'name' => $fileName,
                        'size' => $imageFile->size,
                        "url" => $path,
                        "thumbnailUrl" => $path,
                        "deleteUrl" => '/media/delete?name=' . $fileName,
                        "deleteType" => "POST"
                    ]]
                ]);
            }
        }
        return '';
    }

    public function actionDelete($name)
    {
        $directory = \Yii::getAlias('@backend/web/upload/temp') . DIRECTORY_SEPARATOR . Yii::$app->session->id;
        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }
        $files = FileHelper::findFiles($directory);
        $output = [];
        foreach ($files as $file){
            $path = '/upload/temp/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . basename($file);
            $output['files'][] = [
                'name' => basename($file),
                'size' => filesize($file),
                "url" => $path,
                "thumbnailUrl" => $path,
                "deleteUrl" => '/media/delete?name=' . basename($file),
                "deleteType" => "POST"
            ];
        }
        return Json::encode($output);
    }


}
