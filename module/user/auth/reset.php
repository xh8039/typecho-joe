<div class="box-body">
	<div class="title-h-left fa-2x">找回密码</div>
	<a class="muted-color px12" href="#tab-sign-in" data-toggle="tab">登录</a>
	<i class="icon-spot"></i>
	<a class="muted-color px12" href="#tab-sign-up" data-toggle="tab">注册</a>
</div>
<form id="sign-up">
	<div class="relative line-form mb10"><input change-show=".change-show" type="text" name="email" class="line-form-input" tabindex="1" placeholder=""><i class="line-form-line"></i><div class="scale-placeholder">邮箱</div></div>
	<input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
	<div class="relative line-form mb10 change-show"><input type="text" name="captch" class="line-form-input" autocomplete="off" tabindex="2" placeholder=""><i class="line-form-line"></i><div class="scale-placeholder">验证码</div><span class="yztx abs-right"><button type="button" form-action="resetpassword_captcha" class="but c-blue captchsubmit">发送验证码</button></span><div class="abs-right match-ok muted-color"><i class="fa-fw fa fa-check-circle"></i></div><input type="hidden" name="captcha_type" value="email"><input type="hidden" id="_wpnonce" name="_wpnonce" value="e7b8678e87" /></div>
	<div class="relative line-form mb10"><input type="password" name="password" class="line-form-input" tabindex="3" placeholder=""><div class="scale-placeholder">设置新密码</div><div class="abs-right passw muted-2-color"><i class="fa-fw fa fa-eye"></i></div><i class="line-form-line"></i></div>
	<div class="relative line-form mb10"><input type="password" name="confirm_password" class="line-form-input" tabindex="4" placeholder=""><div class="scale-placeholder">重复密码</div><div class="abs-right passw muted-2-color"><i class="fa-fw fa fa-eye"></i></div><i class="line-form-line"></i></div>
	<div class="box-body"><input type="hidden" name="action" value="reset_password"><input type="hidden" name="repeat" value="1"><button type="button" class="but radius jb-green padding-lg signsubmit-loader btn-block">确认提交</button></div>
</form>