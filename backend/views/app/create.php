<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\App */

$this->title = '应用申请';
$this->params['breadcrumbs'][] = ['label' => '应用管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_apply', [
        'model' => $model,
    ]) ?>

</div>
