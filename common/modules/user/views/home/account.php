<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Admin */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('backend', 'Edit account')

?>

<div class="admin-form">
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model) ?> 

    <?= $form->field($model, 'username')->label('用户名称')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'email')->label('用户邮箱')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->label('用户密码')->passwordInput() ?>
    
    <?php echo $form->field($model, 'password_confirm')->passwordInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
