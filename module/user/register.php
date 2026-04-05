<div class="box-body">
	<div class="title-h-left fa-2x">注册</div>
	<a class="muted-color px12" href="#tab-sign-in" data-toggle="tab">已有账号，立即登录<i class="em12 ml3 fa fa-angle-right"></i></a>
</div>
<!-- <form>
	<div class="mb20">
		<div class="relative line-form mb10">
			<input change-show=".change-show" type="text" name="email" class="line-form-input" tabindex="1" placeholder="">
			<i class="line-form-line"></i>
			<div class="scale-placeholder">邮箱</div>
		</div>
		<input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
		<div class="relative line-form mb10 change-show">
			<input type="text" name="captch" class="line-form-input" autocomplete="off" tabindex="2" placeholder="">
			<i class="line-form-line"></i>
			<div class="scale-placeholder">验证码</div>
			<span class="yztx abs-right">
				<button type="button" form-action="bind_email_captcha" class="but c-blue captchsubmit">发送验证码</button>
			</span>
			<div class="abs-right match-ok muted-color">
				<i class="fa-fw fa fa-check-circle"></i>
			</div>
			<input type="hidden" name="captcha_type" value="email">
			<input type="hidden" id="_wpnonce" name="_wpnonce" value="8e6a7c0861" />
		</div>
	</div>
	<div class="form-checkbox muted-color mb20">
		<input name="user_agreement" id="user_agreement" type="checkbox" checked="checked">
		<label for="user_agreement" class="px12 ml6" style="font-weight:normal;">
			已阅读并同意<a class="focus-color" target="_blank" href="">用户协议</a>
			、<a class="focus-color" target="_blank" href="">隐私声明</a>
		</label>
	</div>
	<input type="hidden" name="action" value="user_bind_email">
	<button type="button" class="but jb-blue padding-lg btn-block signsubmit-loader">
		<i class="fa fa-check"></i>
		确认提交
	</button>
</form> -->
<form id="sign-up">
	<div id="tab-bind-email">
		<div class="relative line-form mb10">
			<input change-show=".change-show" type="text" name="email" class="line-form-input" tabindex="1" placeholder=""><i class="line-form-line"></i><div class="scale-placeholder">邮箱</div>
		</div>
		<input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
		<div class="relative line-form mb10 change-show">
			<input type="text" name="captch" class="line-form-input" autocomplete="off" tabindex="2" placeholder="">
			<i class="line-form-line"></i>
			<div class="scale-placeholder">验证码</div>
			<span class="yztx abs-right"><button type="button" form-action="bind_email_captcha" class="but c-blue captchsubmit">发送验证码</button></span>
			<div class="abs-right match-ok muted-color"><i class="fa-fw fa fa-check-circle"></i></div>
			<input type="hidden" name="captcha_type" value="email">
			<input type="hidden" id="_wpnonce" name="_wpnonce" value="8e6a7c0861" />
		</div>
		<!-- <input type="hidden" name="action" value="user_bind_email"> -->
	</div>
	<div class="relative line-form mb10">
		<input type="password" name="password" class="line-form-input" tabindex="3" placeholder="">
		<div class="scale-placeholder">设置密码</div>
		<div class="abs-right passw muted-2-color"><i class="fa-fw fa fa-eye"></i></div>
		<i class="line-form-line"></i>
	</div>
	<div class="relative line-form mb10">
		<input type="password" name="confirm_password" class="line-form-input" tabindex="4" placeholder="">
		<div class="scale-placeholder">重复密码</div>
		<div class="abs-right passw muted-2-color"><i class="fa-fw fa fa-eye"></i></div>
		<i class="line-form-line"></i>
	</div>
	<!-- <input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id=""> -->
	<div class="box-body">
		<input type="hidden" name="action" value="user_signup">
		<button type="button" class="but radius jb-green padding-lg signsubmit-loader btn-block"><svg class="icon mr10" aria-hidden="true" data-viewBox="0 0 1024 1024" viewBox="0 0 1024 1024"><use xlink:href="#icon-signup"></use></svg>注册</button>
		<div class="muted-color mt10 text-center px12 opacity8">注册即表示同意<a class="focus-color" target="_blank" href="<?= $this->options->joe_user_agreement_page_url ?>">用户协议</a> 、<a class="focus-color" target="_blank" href="<?= $this->options->joe_user_privacy_page_url ?>">隐私声明</a></div>
	</div>
</form>