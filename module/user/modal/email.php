<div class="tab-content box-body nopw-sm">
	<div class="hide"><a href="#tab-bind-email" data-toggle="tab">修改邮箱</a><a href="#tab-change-password" data-toggle="tab">修改密码</a><a href="#tab-bind-phone" data-toggle="tab">绑定手机</a></div>
	<div class="tab-pane fade active in" id="tab-bind-email">
		<div class="modal-colorful-header colorful-bg jb-blue"><button class="close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true">
					<use xlink:href="#icon-close"></use>
				</svg></button>
			<div class="colorful-make"></div>
			<div class="text-center">
				<div class="em2x"><i class="fa fa-envelope-o"></i></div>
				<div class="mt10 em12 padding-w10">修改邮箱</div>
			</div>
		</div>
		<div class="tab-content">
			<ul class="mb20 step-simple">
				<li class="active"><a href="#tab-bind-email-verify" data-toggle="tab">验证老邮箱</a></li>
				<li><span>验证新邮箱</span><a href="#tab-bind-email-bind" data-toggle="tab" class="hide"></a></li>
				<li><span>修改成功</span></li>
			</ul>
			<div class="tab-pane fade active in" id="tab-bind-email-verify">
				<p class="muted-2-color">请在下方获取验证码以验证您的老邮箱&nbsp;<span class="badg"><?= joe_user_alloc()->mail ?></span></p>
				<form ajax-submit=".user-verify-submit">
					<div class="mb20"><input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
						<div class="relative line-form mb10"><input type="text" name="captch" class="line-form-input" autocomplete="off" tabindex="1" placeholder=""><i class="line-form-line"></i>
							<div class="scale-placeholder">验证码</div><span class="yztx abs-right"><button type="button" form-action="verify_user_captcha" class="but c-blue captchsubmit">发送验证码</button></span>
							<div class="abs-right match-ok muted-color"><i class="fa-fw fa fa-check-circle"></i></div><input type="hidden" name="captcha_type" value="email"><input type="hidden" id="_wpnonce" name="_wpnonce" value="62cd5bd61e" />
						</div>
					</div><input type="hidden" name="action" value="verify_user"><button type="button" class="but jb-blue padding-lg btn-block user-verify-submit" next-tab="" tabindex="2"><i class="fa fa-shield"></i> 立即验证</button>
				</form>
			</div>
			<div class="tab-pane fade" id="tab-bind-email-bind">
				<p class="muted-2-color">请输入您需要修改的新邮箱账号</p>
				<form>
					<div class="mb20">
						<div class="relative line-form mb10"><input change-show=".change-show" type="text" name="email" class="line-form-input" tabindex="1" placeholder=""><i class="line-form-line"></i>
							<div class="scale-placeholder">邮箱</div>
						</div><input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
						<div class="relative line-form mb10 change-show"><input type="text" name="captch" class="line-form-input" autocomplete="off" tabindex="2" placeholder=""><i class="line-form-line"></i>
							<div class="scale-placeholder">验证码</div><span class="yztx abs-right"><button type="button" form-action="bind_email_captcha" class="but c-blue captchsubmit">发送验证码</button></span>
							<div class="abs-right match-ok muted-color"><i class="fa-fw fa fa-check-circle"></i></div><input type="hidden" name="captcha_type" value="email"><input type="hidden" id="_wpnonce" name="_wpnonce" value="7f4080420f" />
						</div>
					</div> 
					<div class="form-checkbox muted-color mb20"><input name="user_agreement" id="user_agreement" type="checkbox" checked="checked"><label for="user_agreement" class="px12 ml6" style="font-weight:normal;">已阅读并同意<a class="focus-color" target="_blank" href="<?= $this->options->joe_user_agreement_page_url ?>">用户协议</a>、<a class="focus-color" target="_blank" href="<?= $this->options->joe_user_privacy_page_url ?>">隐私声明</a></label></div><input type="hidden" name="action" value="user_bind_email"><button type="button" class="but jb-blue padding-lg btn-block signsubmit-loader"><i class="fa fa-check"></i> 确认提交</button>
				</form>
			</div>
		</div>
	</div>
</div>