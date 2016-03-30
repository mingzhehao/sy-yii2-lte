<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UploadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '上传管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加上传', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'image',
                'format' => ['image',['width'=>'100','height'=>'100']],
                'value'     => function ($data) {
                    //$sourcePath = Yii::$app->params['upload']['webPath'];
                    return $data->image;
                }
            ],
            [
                'attribute' => 'file',
                'format' => ['image',['width'=>'100','height'=>'100']],
                'value'     => function ($data) {
                    //$sourcePath = Yii::$app->params['upload']['webPath'];
                    return $data->file;
                }
            ],
            [   
                'attribute' => 'created_at', 
                'format' => 'text',
                'value' => function($data){return date("Y-m-d H:i:s",($data->created_at));},
            ],  
            [   
                'attribute' => 'updated_at', 
                'format' => 'text',
                'value' => function($data){return date("Y-m-d H:i:s",($data->updated_at));},
            ],  
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
