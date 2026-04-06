<div class="tab-content box-body nopw-sm">
	<div class="hide"><a href="#tab-bind-email" data-toggle="tab">修改邮箱</a><a href="#tab-change-password" data-toggle="tab">修改密码</a><a href="#tab-bind-phone" data-toggle="tab">绑定手机</a></div>
	<div class="tab-pane fade active in" id="tab-change-password">
		<div class="modal-colorful-header colorful-bg jb-yellow">
			<button class="close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
			<div class="colorful-make"></div>
			<div class="text-center">
				<div class="em2x"><i class="fa fa-unlock-alt"></i></div>
				<div class="mt10 em12 padding-w10">修改密码</div>
			</div>
		</div>
		<form>
			<div class="mb20">
				<div class="relative line-form mb10"><input type="password" name="passwordold" class="line-form-input" tabindex="1" placeholder="">
					<div class="scale-placeholder">请输入原密码</div>
					<div class="abs-right passw muted-2-color"><i class="fa-fw fa fa-eye"></i></div><i class="line-form-line"></i>
				</div>
				<div class="relative line-form mb10"><input type="password" name="password" class="line-form-input" tabindex="2" placeholder="">
					<div class="scale-placeholder">请输入新密码</div>
					<div class="abs-right passw muted-2-color"><i class="fa-fw fa fa-eye"></i></div><i class="line-form-line"></i>
				</div>
				<div class="relative line-form mb10"><input type="password" name="password2" class="line-form-input" tabindex="3" placeholder="">
					<div class="scale-placeholder">请再次输入新密码</div>
					<div class="abs-right passw muted-2-color"><i class="fa-fw fa fa-eye"></i></div><i class="line-form-line"></i>
				</div><input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
			</div><input type="hidden" name="action" value="user_change_password"><button type="button" class="but jb-blue padding-lg btn-block signsubmit-loader"><i class="fa fa-check"></i> 确认提交</button>
		</form>
		<div class="text-right mt6"><a data-toggle="tab" href="#tab-reset-password" class="em09 muted-2-color">忘记原密码？点击重设密码</a></div>
	</div>
	<div class="tab-pane fade" id="tab-reset-password">
		<div class="modal-colorful-header colorful-bg jb-yellow">
			<button class="close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
			<div class="colorful-make"></div>
			<div class="text-center">
				<div class="em2x"><i class="fa fa-unlock-alt"></i></div>
				<div class="mt10 em12 padding-w10">重设密码</div>
			</div>
		</div>
		<div class="text-riht mb10 ml10"><a data-toggle="tab" href="#tab-change-password" class="em09 but p2-10"><i class="fa fa-angle-left em12"></i> 返回使用原密码修改密码</a></div>
		<form id="sign-up">
			<div class="relative line-form mb10"><input readonly value="<?= joe_user_alloc()->mail ?>" type="email" name="email" class="line-form-input" tabindex="-1" placeholder=""><i class="line-form-line"></i><div class="scale-placeholder is-focus">邮箱</div></div>
			<input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
			<div class="relative line-form mb10"><input type="text" name="captch" class="line-form-input" autocomplete="off" tabindex="0" placeholder=""><i class="line-form-line"></i>
				<div class="scale-placeholder">验证码</div><span class="yztx abs-right"><button type="button" form-action="resetpassword_captcha" class="but c-blue captchsubmit">发送验证码</button></span>
				<div class="abs-right match-ok muted-color"><i class="fa-fw fa fa-check-circle"></i></div><input type="hidden" name="captcha_type" value="email"><input type="hidden" id="_wpnonce" name="_wpnonce" value="db0aa9f549" />
			</div>
			<div class="relative line-form mb10"><input type="password" name="password" class="line-form-input" tabindex="1" placeholder="">
				<div class="scale-placeholder">设置新密码</div>
				<div class="abs-right passw muted-2-color"><i class="fa-fw fa fa-eye"></i></div><i class="line-form-line"></i>
			</div>
			<div class="relative line-form mb10"><input type="password" name="confirm_password" class="line-form-input" tabindex="2" placeholder="">
				<div class="scale-placeholder">重复密码</div>
				<div class="abs-right passw muted-2-color"><i class="fa-fw fa fa-eye"></i></div><i class="line-form-line"></i>
			</div>
			<div class="box-body"><input type="hidden" name="action" value="reset_password"><input type="hidden" name="repeat" value="1"><button type="button" class="but radius jb-green padding-lg signsubmit-loader btn-block">确认提交</button></div>
		</form>
	</div>
</div>