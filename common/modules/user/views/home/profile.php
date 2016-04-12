<?php

use common\models\UserProfile;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfile */
/* @var $form yii\bootstrap\ActiveForm */

$this->title = Yii::t('backend', 'Edit profile')
?>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>


    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
