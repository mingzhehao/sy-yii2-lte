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

