##################################################
# author    : songyun
# email     : mingzhehao@github.com
# 开发目的  : 减少不必需的搭建成本，提高效率，更专注于逻辑功能的开发。
# yii2
##################################################

1.项目搭建：
    拷贝整个项目到开发环境下（由于某些依赖插件已经被二次开发，所以为了更好的使用框架，需要全体copy过去，如果不进行全体copy也可以，插件部分需要自行修改，优化）

2.配置config/main-local.php数据库信息

3.依照main-local.php中配置的数据库信息，在本地mysql建立对应的数据库信息

4.执行 php yii migrate 进行数据迁移 

5.对runtime ，web assert 等目录 进行nginx 用户组权限赋予

6.新添加上传插件2amigos/yii2-file-upload-widget 上传控制器为MediaController，控制器内填写上传目录等，需配置目录nginx可写权限 (需要对upload/temp 目录进行 777 授权，以及chown改变所属)

7.进行google 字体域名替换， 执行 transfer_google_360.sh 脚本进行自动替换即可

8.rbac 安装 
  a 执行  
    yii migrate --migrationPath=@mdm/admin/migrations
  b 执行  
    yii migrate --migrationPath=@yii/rbac/migrations
  
  执行yii migrate 的时候，由于migrate是依赖于console的，所以公共的config配置，需要放置在common/config中
  比如:
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
            'defaultRoles' => ['guest'],
        ],
   这段代码需要放置在common/config/main.php中，不然执行 b 的时候 会报错
 
8.菜单如何使用
  a. 权限管理配置菜单(菜单对应路由，已从权限管理路由列表 左侧移动到右侧)
  b. 在 backend/views/layouts/common.php 菜单对应位置配置 ,添加如下代码，可自行调整
     echo dmstr\widgets\Menu::widget( [
         'options' => ['class' => 'sidebar-menu'], 
         'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id), 
     ] );

     执行调整后如下：
         'label'=>Yii::t('backend', 'Content'),
         'url' => '#',
         'icon'=>'<i class="fa fa-edit"></i>',
         'options' => ['class' => 'sidebar-menu'], 
         'items' => MenuHelper::getAssignedMenu(Yii::$app->user->id), 

   c. 引入rbac 在 backend/views/layouts/common.php
      use mdm\admin\components\MenuHelper; 

9.引入Kint调试
    kint调试可以显示更多的object信息，浏览器默认只会显示部分object信息，不全面
