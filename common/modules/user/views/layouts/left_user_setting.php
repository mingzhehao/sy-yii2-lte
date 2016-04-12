<?php
use yii\helpers\Html;

/**
 * @var \yii\web\View $this
 * @var \yii\gii\Generator[] $generators
 * @var \yii\gii\Generator $activeGenerator
 * @var string $content
 */
//$activeGenerator = Yii::$app->controller->generator;

/* 资源引用注册 */
$asset = common\modules\user\assets\AppAsset::register($this);

?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php //$this->beginContent('@app/views/layouts/main.php'); ?>
<style type="text/css">
.list-group .glyphicon {
        float: right;
}
</style>
<div class="row">
    <div class="col-lg-9">
        <?= $content ?>
    </div>
</div>
<?php $this->endContent(); ?>

