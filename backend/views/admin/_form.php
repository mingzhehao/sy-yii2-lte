<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model) ?> 

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash_new')->label("密码")->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput()->dropDownList(["10" => "活跃","0" => "封禁"]) ?>

    <?= $form->field($model, 'password_hash')->label('')->hiddenInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
