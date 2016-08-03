<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Admin */

$this->title = '添加用户';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-create">

    <?= $this->render('_form_create', [
        'model' => $model,
    ]) ?>

</div>
