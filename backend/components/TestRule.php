<?php
/**
 * @file components/TestRule.php
 * @author root(mingzhehao@github.com)
 * @date 2016/08/03 17:59:39
 *  
 **/

namespace backend\components;
use Yii;
use yii\rbac\Rule;

class TestRule extends Rule
{
    public $name = 'testRule';
    public function execute($user, $item, $params)
    {
        // 这里先设置为false,逻辑上后面再完善
        return false;
    }
}


/**
class ArticleRule extends Rule
{
    public $name = 'article';
    #
    #@param string|integer $user 当前登录用户的uid
    #@param Item $item 所属规则rule，也就是我们后面要进行的新增规则
    #@param array $params 当前请求携带的参数. 
    #@return true或false.true用户可访问 false用户不可访问
    #
    public function execute($user, $item, $params)
    {
        $id = isset($params['id']) ? $params['id'] : null;
        if (!$id) {
            return false;
        }
        $model = Article::findOne($id);
        if (!$model) {
            return false;
        }
        $username = Yii::$app->user->identity->username;
        $role = Yii::$app->user->identity->role;
        if ($role == User::ROLE_ADMIN || $username == $model->operate) {
            return true;
        }
        return false;
    }
}

**/



