<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Upload */

$this->title = '添加';
$this->params['breadcrumbs'][] = ['label' => '上传管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
