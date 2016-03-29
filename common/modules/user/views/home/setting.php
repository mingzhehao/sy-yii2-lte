<div class="page-header">
    <h1>
        个人设置
        <ul id="w0" class="nav nav-tabs">
            <li class="active"><a href="/User/setting">个人信息</a></li>
            <li><a href="/User/avatar">修改头像</a></li>
            <li><a href="/User/password">修改密码</a></li>
            <li><a href="/User/third">第三方登录</a></li>
        </ul>    
    </h1>
</div>

<form id="w1" class="form-horizontal" action="/user/site/index" method="post" role="form">
<input type="hidden" name="_csrf" value="eGpIVE5NT2syUwJtKQE6Ax05LBh5ASEbEigRYTlgPC0tGzwAfSV7JA==">
<div class="form-group field-user-email">
<label class="control-label col-sm-3" for="user-email">电子邮箱</label>
<div class="col-sm-6">
<input type="text" id="user-email" class="form-control" name="User[email]" value="190833714@qq.com" maxlength="45">
<div class="help-block help-block-error "></div>
</div>

</div>
<div class="form-group field-user-nickname">
<label class="control-label col-sm-3" for="user-nickname">昵称</label>
<div class="col-sm-6">
<input type="text" id="user-nickname" class="form-control" name="User[nickname]" maxlength="45">
<div class="help-block help-block-error "></div>
</div>

</div>
<div class="form-group field-user-gender">
<label class="control-label col-sm-3" for="user-gender">性别</label>
<div class="col-sm-6">
<input type="hidden" name="User[gender]" value=""><div id="user-gender"><label class="radio-inline"><input type="radio" name="User[gender]" value="0"> 保密</label>
<label class="radio-inline"><input type="radio" name="User[gender]" value="1"> 男</label>
<label class="radio-inline"><input type="radio" name="User[gender]" value="2"> 女</label></div>
<div class="help-block help-block-error "></div>
</div>

</div>
<div class="form-group field-user-website">
<label class="control-label col-sm-3" for="user-website">个人主页</label>
<div class="col-sm-6">
<input type="text" id="user-website" class="form-control" name="User[website]" maxlength="45">
<div class="help-block help-block-error "></div>
</div>

</div>
<div class="form-group field-user-qq">
<label class="control-label col-sm-3" for="user-qq">QQ</label>
<div class="col-sm-6">
<input type="text" id="user-qq" class="form-control" name="User[qq]" maxlength="45">
<div class="help-block help-block-error "></div>
</div>

</div>
<div class="form-group field-user-qq_group">
<label class="control-label col-sm-3" for="user-qq_group">QQ群</label>
<div class="col-sm-6">
<select id="user-qq_group" class="form-control" name="User[qq_group]">
<option value="0" selected="">-请选择您已加入的群-</option>
<option value="1">Yii Framework ①</option>
<option value="2">Yii Framework ②</option>
<option value="3">Yii Framework ③</option>
<option value="4">Yii Framework ④</option>
<option value="5">Yii Framework ⑤</option>
<option value="6">Yii Framework ⑥</option>
<option value="7">Yii Framework ⑦</option>
<option value="8">Yii Framework ⑧</option>
<option value="9">Yii Framework ⑨</option>
<option value="10">Yii Framework ⑩</option>
</select>
<div class="help-block help-block-error "></div>
</div>

</div>
<div class="form-group field-user-github">
<label class="control-label col-sm-3" for="user-github">GitHub帐号</label>
<div class="col-sm-6">
<input type="text" id="user-github" class="form-control" name="User[github]" maxlength="45">
<div class="help-block help-block-error "></div>
</div>

</div>
<div class="form-group field-user-location">
<label class="control-label col-sm-3" for="user-location">所在地</label>
<div class="col-sm-6">
<input type="text" id="user-location" class="form-control" name="User[location]" maxlength="45">
<div class="help-block help-block-error "></div>
</div>

</div>
<div class="form-group field-user-birthday">
<label class="control-label col-sm-3" for="user-birthday">生日</label>
<div class="col-sm-6">
<input type="text" id="user-birthday" class="form-control" name="User[birthday]" readonly="readonly" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-language="zh-CN">
<div class="help-block help-block-error "></div>
</div>

</div>
<div class="form-group field-user-signature">
<label class="control-label col-sm-3" for="user-signature">个性签名</label>
<div class="col-sm-6">
<textarea id="user-signature" class="form-control" name="User[signature]" maxlength="45"></textarea>
<div class="help-block help-block-error "></div>
</div>

</div>

<div class="form-group">
    <div class="col-sm-3"></div>
    <div class="col-sm-6"><button type="submit" class="btn btn-primary">修改</button></div>
</div>

</form> 
