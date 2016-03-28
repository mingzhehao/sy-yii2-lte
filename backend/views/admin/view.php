<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */

$this->title = "用户：".$model->username;
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

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
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            [
                'attribute' =>  'status', 
                'label'     =>  '状态',
                'format'    =>  'raw',
                'value'     =>  $model->status ==10 ? 
                    '<span class="label label-success">活跃</span>' : 
                    '<span class="label label-danger">封禁</span>',
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
