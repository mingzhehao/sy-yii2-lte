<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;

/* @var $this yii\web\View */
/* @var $model common\models\Upload */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="upload-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imageHidden')->hiddenInput([])->label("图片") ?>

    <?= FileUploadUI::widget([
        'model' => $model,
        'attribute' => 'image',
        'url' => ['media/upload','type' => 'image'],
        'gallery' => false,
        'fieldOptions' => [
                'accept' => 'image/*'
        ],
        'clientOptions' => [
            'maxFileSize' => 2000000,
            'multiple' => false,
            'maxNumberOfFiles' => 1,
        ],
        // ...
        'clientEvents' => [
                'fileuploaddone' => 'function(e, data) {
                    var imageObject = data._response.result.files[0];
                    $("#imagehidden").val(imageObject.url);
                }',
                'fileuploadfail' => 'function(e, data) {
                }',
        ],
    ]);
    ?>

    <?= $form->field($model, 'fileHidden')->hiddenInput(['maxlength' => true]) ?>

    <?= FileUploadUI::widget([
        'model' => $model,
        'attribute' => 'file',
        'url' => ['media/upload','type' => 'file'],
        'gallery' => false,
        'fieldOptions' => [
            'accept' => 
                'application/zip,application/x-rar-compressed,video/x-ms-wmv',//限制zip和rar包
        ],
        'clientOptions' => [
                'maxFileSize' => 200000000
        ],
        // ...
        'clientEvents' => [
                'fileuploaddone' => 'function(e, data) {
                    var fileObject = data._response.result.files[0];
                    $("#filehidden").val(fileObject.url);
                                    }',
                'fileuploadfail' => 'function(e, data) {
                                    }',
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
