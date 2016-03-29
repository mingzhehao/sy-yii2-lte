<?php
$userid = $model->id;//url中的id
$userImage = explode('.',$model->photo);
if(empty($userImage) || empty($model->photo))
{
    $userImageSrc    = Yii::getAlias('@backend/web/images/');
    $userSmall       = "noavatar_small.gif";
    $userSmallImage  = $userImageSrc.$userSmall;
}
else
{
    $userSmallImage  = $userImage['0'].'_small.'.$userImage['1'];
}

?>

<div class="popover-content">
    <div class="popover-User">
        <div class="media media-User">
            <div class="media-left">
                <a href="/User/<?php echo $userid;?>">
                    <img src="<?php echo '/images/'.$userSmallImage;?>" alt="头像"></a>
                <div class="label label-primary">试用期</div>
            </div>
            <div class="media-body">
                <h2 class="media-heading">
                    <a href="/User/<?php echo $userid;?>"><?php echo $model->username; ?></a>
                </h2>
                <div class="time">
                    注册时间：<?php echo date("Y-m-d H:i:s",$model->created_at);?>
                    <br>
                    最后登录：18分钟前
                    <br>在线时长：2 小时</div>
            </div>
        </div>
        <div class="media-footer">
            <div class="board">
                <span>
                    粉丝
                    <br> <em>0</em>
                </span>
                <span>
                    金钱
                    <br> <em>0</em>
                </span>
                <span>
                    威望
                    <br>
                    <em>0</em>
                </span>
                <span>
                    积分
                    <br>
                    <em>20</em>
                </span>
            </div>
            <a class="btn btn-xs btn-success btn-follow" href="/follow?id=<?php echo $userid;?>">
                <span class="glyphicon glyphicon-plus"></span>
                关注
            </a>
            <a class="btn btn-xs btn-primary" href="/User/message/create?id=<?php echo $userid;?>">
                <span class="glyphicon glyphicon-envelope"></span>
                发私信
            </a>
        </div>
    </div>
</div>
