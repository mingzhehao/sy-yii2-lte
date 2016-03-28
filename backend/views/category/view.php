<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '分类列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' =>  'status', 
                'label'     =>  '分类状态',
                'format'    =>  'raw',
                'value'     =>  $model->status =='1' ? 
                    '<span class="label label-success">审核通过</span>' : 
                    '<span class="label label-danger">等待审核</span>',
            ], 
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
