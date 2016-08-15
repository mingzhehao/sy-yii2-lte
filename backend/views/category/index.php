<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '分类列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建分类', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            [   
                'attribute' => 'status',
                'label'     => '评论状态',
                'value'     => function ($data) {
                    if(!empty($data->status))
                        return '审核通过';
                    else
                        return '等待审核';
                },  
                'filter'    => [
                        0 => '等待审核',//key 0  为传递到后台搜索值，值为对外显示值
                        1 => '审核通过',
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
