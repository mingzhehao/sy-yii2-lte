<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;

$requestUrl = Url::toRoute('create');
$js = <<<JS
    $(document).on('click', '#create', function () {
        $.get('{$requestUrl}', {},
            function (data) {
                $('.modal-body').html(data);
            }  
        );
    });
JS;
$this->registerJs($js);
?>
<div class="admin-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加用户', ['create'],
            [
                'class' => 'btn btn-success',
                'id' => 'create',
                'data-toggle' => 'modal',
                'data-target' => '#create-modal',
            ]) 
        ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            [
                'attribute' => 'status',
                'value'     => function($data){
                    if($data->status == 10)
                        return "活跃";
                    else
                        return "封禁";
                },
                'filter'    => [
                        10  => '活跃',//key 0  为传递到后台搜索值，值为对外显示值
                        0   => '封禁',
                   ],  
            ],
            [   
                'attribute' => 'created_at', 
                'format' => 'text',
                'value' => function($data){return date("Y-m-d H:i:s",($data->created_at));},
            ],  
            [   
                'attribute' => 'updated_at', 
                'format' => 'text',
                'value' => function($data){return date("Y-m-d H:i:s",($data->updated_at));},
            ],  

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php
Modal::begin([
    'id' => 'create-modal',
    'header' => '<h4 class="modal-title">创建</h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
]); 
Modal::end();
?>
