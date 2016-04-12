<?php
use yii\helpers\Html;
use common\models\User;
/**
 * @var \yii\web\View $this
 * @var \yii\gii\Generator[] $generators
 * @var \yii\gii\Generator $activeGenerator
 * @var string $content
 */
//$activeGenerator = Yii::$app->controller->generator;


/*
 *  如果url中传递的id存在，判断是否是当前登录用户，
 *  $userid == Yii::$app->user->id;
 *  1.是当前用户调用模块为1，
 *  2.不是当前模块调用模块为2
 */
$userid = isset($_GET['id'])?$_GET['id']:Yii::$app->user->id;//url中的id
$userImage = explode('.',Yii::$app->user->getIdentity()->photo);
if(empty($userImage) || empty(Yii::$app->user->getIdentity()->photo))
{
    $userImageSrc = Yii::getAlias('@backend/web/images/');
    $userMiddleImage = "images/noavatar_middle.gif";
    $userBigImage    = "images/noavatar_big.gif";
}
else
{
    $userMiddleImage = $userImage['0'].'_middle.'.$userImage['1'];
    $userBigImage = $userImage['0'].'_big.'.$userImage['1'];
}

?>
<?php $this->beginContent('@backend/views/layouts/common.php'); ?>
<?php //$this->beginContent('@app/views/layouts/main.php'); ?>
<style type="text/css">
.list-group .glyphicon {
        float: right;
}
</style>
<div class="row">
    <div class="col-lg-3 sidebar">
        <div class="well">
            <div class="media">
                <div class="pull-left">
                    <img class="media-object" src="<?php echo '/'.$userMiddleImage; ?>" alt="" style="width: 100px; height: 100px;">
                </div>                
                <div class="media-body">
                    <?php if($userid == Yii::$app->user->id){ ?>
                        <h2><?php  echo Yii::$app->user->getIdentity()->username; ?></h2>
                        <span class="glyphicon glyphicon-home"></span> <a href="/User/<?php echo $userid; ?>">个人主页</a><br>

                        <span class="glyphicon glyphicon-cog"></span> <a href="/User/setting">帐户设置</a><br>
                        <span class="glyphicon glyphicon-camera"></span> <a href="/User/avatar">修改头像</a>
                    <?php }else{ ?>
                        <h2>HelloBugKiller</h2>
                        <span class="glyphicon glyphicon-home"></span> <a href="/user/<?php echo $userid; ?>">个人主页</a><br>
                        <span class="glyphicon glyphicon-envelope"></span> <a href="/user/message/create?id=<?php echo $userid; ?>">发送私信</a><br>
                        <span class="glyphicon glyphicon-bookmark"></span> <a class="follow" href="/follow?id=<?php echo $userid; ?>">点击关注</a>         
                        <?php } ?>
                        </div>
                </div>
                <div class="media-footer">
                    <a href="/User/<?php echo $userid; ?>/follow">关注(0)</a>                <em>|</em> 
                    <a href="/User/<?php echo $userid; ?>/fans">粉丝(0)</a>                <em>|</em>
                    <a href="/rule">积分(80)</a>            
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">关注<span class="pull-right"><a href="/User/<?php echo $model->id; ?>/follow">全部关注</a></span></div>
                <div class="panel-body">
                    <ul class="avatar-list">
                    </ul>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">粉丝<span class="pull-right"><a href="/User/<?php echo $userid;?>/fans">全部粉丝</a></span></div>
                <div class="panel-body">
                    <ul class="avatar-list">
                                        </ul>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">最近访客<span class="pull-right"><a href="/User/<?php echo $userid;?>/visit">全部访客</a></span></div>
                <div class="panel-body">
                    <ul class="media-list">
                                        </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9 col-sm-8">
            <?= $content ?>
        </div>
</div>
        <?php $this->endContent(); ?>

