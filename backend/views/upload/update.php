<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Upload */

$this->title = '更新: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '上传管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="upload-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
