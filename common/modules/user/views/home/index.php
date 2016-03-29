<div class="col-lg-8">
    <form id="w0" action="/User/message" method="post">
        <input type="hidden" name="_csrf" value="<?php Yii::$app->request->getCsrfToken(); ?>">        
        <div class="form-group field-feed-content required">
            <textarea id="feed-content" class="form-control" name="Feed[content]" rows="2"></textarea>
        </div>      
        <div class="form-group action">
            <a class="emot" href="#" data-toggle="popover" data-original-title="" title=""><span class="glyphicon glyphicon-globe"></span> 添加表情</a>            
            <a class="picture" href="#"><span class="glyphicon glyphicon-picture"></span> 上传图片</a>            
            <span class="hint">你还可以输入<span style="color: #C00">200</span>个字符。</span>
            <span class="pull-right">
                <button type="submit" class="btn btn-sm btn-primary" name="contact-button">发表说说</button>            
            </span>
        </div>
    </form>
    <ul id="w1" class="nav nav-tabs nav-user">
        <li class="active"><a href="/User/default/index?id=28893">全部动态</a></li>
        <li><a href="/User/default/index?id=28893&amp;type=feed">说说</a></li>
        <li><a href="/User/default/index?id=28893&amp;type=guestbook">留言</a></li>
        <li><a href="/User/default/index?id=28893&amp;type=tutorial">教程</a></li>
        <li><a href="/User/default/index?id=28893&amp;type=extension">扩展</a></li>
        <li><a href="/User/default/index?id=28893&amp;type=code">源码</a></li>
        <li><a href="/User/default/index?id=28893&amp;type=question">问答</a></li>
        <li><a href="/User/default/index?id=28893&amp;type=topic">讨论</a></li>
    </ul>        
    <ul id="w2" class="media-list">
        <li class="media" data-key="[]"><a class="pull-left" href="/User/28893" data-original-title="" title=""><img class="media-object" src="/images/noavatar_small.gif" alt=""></a>
            <div class="media-body">
                <div class="media-heading"><a href="/User/28893">yiiframework</a> 发表了说说</div>
                <div class="media-content">你们太水了</div>
                <div class="media-action">
                    <span class="time">19小时前</span>
                    <span class="pull-right">浏览(10) | <a href="/feed/1257">回复(0)</a></span>
                </div>
            </div>
        </li>
    </ul>    
</div>
<div class="col-lg-4">
    <div class="board">
        <span>财富值<br><em>0</em></span>
        <span>威望值<br><em>0</em></span>
        <span>总积分<br><em>80</em></span>
    </div>
    <p>
        <span style="color: #D8582B; font-weight: bold;">职场新人</span>
        <span class="pull-right"><a href="/rule">查看等级规则</a> | <a href="/top">排行榜</a></span>
    </p>
    <div id="w3" class="progress">
        <div class="progress-bar-success progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
            80/100<span class="sr-only">80% Complete</span>
        </div>
    </div>

    第<em> <?php echo $model->id;?> </em>位会员
    <table class="table table-striped table-bordered detail-view">
        <tbody><tr><th>用户名</th><td><?php echo $model->username;?></td></tr>
            <tr><th>昵称</th><td><span class="not-set">(未设置)</span></td></tr>
            <tr><th>注册时间</th><td><?php echo date("Y-m-d H:i:s",$model->created_at);?></td></tr>
            <tr><th>最后登录</th><td>20分钟前</td></tr>
            <tr><th>生日</th><td><span class="not-set">(未设置)</span></td></tr>
            <tr><th>QQ</th><td><span class="not-set">(未设置)</span></td></tr>
            <tr><th>QQ群</th><td>未设置</td></tr>
            <tr><th>GitHub帐号</th><td><a href="https://github.com/" target="_blank"></a></td></tr>
            <tr><th>电子邮箱</th><td><?php echo $model->email;?></td></tr>
            <tr><th>所在地</th><td><span class="not-set">(未设置)</span></td></tr>
            <tr><th>在线时长</th><td>8 小时</td></tr>
        </tbody>
    </table>
    <div class="page-header">
        <h2>个性签名</h2>
    </div>
</div>
