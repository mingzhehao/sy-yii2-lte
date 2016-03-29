<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
$uid = Yii::$app->user->id;
//$this->title = '个人设置';
//$this->params['breadcrumbs'][] = ['label' => '个人设置', 'url' => ['/User']];
?>
    <div class="page-header">
        <h1>
            <label>个人设置</label>
            <ul id="w0" class="nav nav-tabs"><li><a href="/User/setting?id=<?php echo $uid; ?>">个人信息</a></li>
                <li class="active"><a href="/User/avatar">修改头像</a></li>
                <li><a href="/User/password">修改密码</a></li>
                <li><a href="/User/third">第三方登录</a></li>
            </ul>    
        </h1>
    </div>

<div class="container" id="crop-avatar">
    <div class="preview">
        <!-- Current avatar -->
        <div class="avatar-view" title="Change the avatar" style="margin-left:100px;margin-top:100px;">
          <img src="<?php echo "/".$userBigImage;?>" alt="Avatar">
        </div>
    <!--
        <div class="avatar-big">
            <img src="/uploads/avatar/noavatar_big.gif" alt="">  </div>
        <div class="avatar-middle">
            <img src="/uploads/avatar/noavatar_middle.gif" alt="">   </div>
        <div class="avatar-small">
            <img src="/uploads/avatar/noavatar_small.gif" alt="">    </div>
    -->
    </div>


    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <?php
         $form = ActiveForm::begin([
             'id'    =>  'avatar-form',
             'options'=> ['enctype'=>'multipart/form-data','class'  => 'avatar-form'], // important
             //'name' => 'AvatarForm',
             'method' => 'post',
             'action' => Url::to(['avatar']),
         ]);
        ?>
            <div class="modal-header">
              <button class="close" data-dismiss="modal" type="button">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">上传头像</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input class="avatar-src" name="avatar_src" type="hidden">
                  <input class="avatar-data" name="avatar_data" type="hidden">
                  <label for="avatarInput">本地图片上传</label>
                  <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                    <div class="avatar-preview preview-md"></div>
                    <div class="avatar-preview preview-sm"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
              <button class="btn btn-primary avatar-save" type="submit">Save</button>
            </div>
            <?php
                ActiveForm::end();
            ?>
        </div>
      </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
  </div>

