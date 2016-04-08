<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Memberinfo */
?>
<div class="memberinfo-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address',
            'discribe',
            [
                'attribute' =>  'sex', 
                'format'    =>  'raw',
                'value'     =>  $model->sex =='1' ? 
                    '<span class="label label-success">女</span>' : 
                    '<span class="label label-danger">男</span>',
            ],
            'age',
            [
                'attribute' => 'created_at',
                'value'     => date("Y-m-d H:i:s",$model->created_at)
            ],
            [
                'attribute' => 'updated_at',
                'value'     => date("Y-m-d H:i:s",$model->updated_at)
            ],
        ],
    ]) ?>

</div>
