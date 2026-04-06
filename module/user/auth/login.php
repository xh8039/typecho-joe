<div class="box-body">
	<div class="title-h-left fa-2x">登录</div>
	<a class="muted-color px12" href="#tab-sign-up" data-toggle="tab">没有账号？立即注册<i class="em12 ml3 fa fa-angle-right"></i></a>
</div>
<div id="sign-in">
	<form>
		<div class="relative line-form mb10">
			<input type="text" name="username" class="line-form-input" tabindex="1" placeholder="">
			<i class="line-form-line"></i>
			<div class="scale-placeholder">账号/邮箱</div>
		</div>
		<div class="relative line-form mb10">
			<input type="password" name="password" class="line-form-input" tabindex="2" placeholder="">
			<div class="scale-placeholder">登录密码</div>
			<div class="abs-right passw muted-2-color">
				<i class="fa-fw fa fa-eye"></i>
			</div>
			<i class="line-form-line"></i>
		</div>
		<input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
		<div class="relative line-form mb10 em09">
			<span class="muted-color form-checkbox"><input type="checkbox" id="remember" checked="checked" tabindex="4" name="remember" value="forever"><label for="remember" class="ml3">记住登录</label></span>
			<span class="pull-right muted-2-color"><a class="muted-2-color" href="#tab-resetpassword" data-toggle="tab">找回密码</a></span>
		</div>
		<div class="box-body">
			<input type="hidden" name="action" value="user_signin">
			<button type="button" class="but radius jb-blue padding-lg signsubmit-loader btn-block"><i class="fa fa-sign-in mr10"></i>登录</button>
		</div>
	</form>
</div>