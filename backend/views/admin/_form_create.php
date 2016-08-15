<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Role;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">
    <?php $form = ActiveForm::begin(
        [
            'id' => 'form-id',
            'enableAjaxValidation' => true,
        ]
    ); ?>
    
    <?= $form->errorSummary($model) ?> 

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput() ?>

    <?= $form->field($model, 'status')->textInput()->dropDownList(["10" => "活跃","0" => "封禁"]) ?>
    
    <?= $form->field($model, 'role')->textInput()->dropDownList(Role::getRoleList()) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

