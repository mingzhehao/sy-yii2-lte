<?php

namespace backend\controllers;
use common\models\ElasticSearch;
use backend\controllers\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ElasticSearchController extends \yii\web\Controller
{
    /**
     * 该方法使用说明：
     * 查询和插入Elasticsearch的数据，都需要符合common\models\ElasticSearch的attributes ,不然不可以查询和插入
     * 可以配合kibana进行数据查看
     */
    public function actionIndex()
    {
        $customer = new ElasticSearch();
        # $customer->primaryKey = 1; // in this case equivalent to $customer->id = 1;
        # $customer->attributes = [
        #                 'name'      => 'test',
        #                 'address'   => '中国',
        #                 'title'     => '文章',
        #                 'created_at'=> time(),
        #                 'updated_at'=> time(),
        #                 'status'    => '1'];
        # $customer->save();

        $customer = ElasticSearch::get(1); // get a record by pk
        var_dump($customer);exit;
       // $customers = ElasticSearch::mget([1,2,3]); // get multiple records by pk
       // $customer = ElasticSearch::find()->where(['name' => 'test'])->one(); // find by query, note that you need to configure mapping for this field in order to find records properly
       // $customers = ElasticSearch::find()->active()->all(); // find all by query (using the `active` scope)

       // // http://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-match-query.html
       // $result = ElasticSearch::find()->query(["match" => ["title" => "yii"]])->all(); // articles whose title contains "yii"

        // http://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-flt-query.html
        $query = ElasticSearch::find()->query([
            "fuzzy_like_this" => [
                "fields" => ["title", "description"],
                "like_text" => "This query will return articles that are similar to this text :-)",
                "max_query_terms" => 12
            ]
        ]);

        $query->all(); // gives you all the documents
        // you can add facets to your search:
        //$query->addStatisticalFacet('click_stats', ['field' => 'visit_count']);
        //$query->search();
        return $this->render('index');
    }

}
