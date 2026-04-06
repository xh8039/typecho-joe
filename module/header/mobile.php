<?php
/*
 * @Author        : 易航
 * @Url           : blog.yihang.info
 * @Date          : 2026-03-25 00:00:00
 * @LastEditTime  : 2026-03-27 00:00:00
 * @Email         : 2136118039@qq.com
 * @Project       : Joe主题
 * @Description   : 一款优雅极速的Typecho主题
 * @Read me       : 感谢您使用Joe主题，主题源码有详细的注释，支持二次开发。
 * @Remind        : 使用盗版主题会存在各种未知风险。支持正版，从我做起！
 */

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<div class="mobile-header">
	<nav mini-touch="mobile-nav" touch-direction="left" class="mobile-navbar visible-xs-block scroll-y mini-scrollbar left">
		<?php $this->need('module/navbar/mobile/logo.php');
		if ($this->options->joe_theme_mode_switch == 'on') {
			?><a href="javascript:;" class="toggle-theme toggle-radius"><i class="fa fa-toggle-theme"></i></a><?php
		}
		$this->need('module/navbar/mobile/menu.php') ?>
		<div class="posts-nav-box" data-title="文章目录"></div>
		<?php
		if ($this->user->hasLogin()) {
			$this->need('module/navbar/mobile/user.php');
		} else {
		?>
			<div class="sub-user-box">
				<div class="text-center">
					<div class="flex jsa header-user-href">
						<a href="javascript:;" class="signin-loader"><div class="badg mb6 toggle-radius c-blue"><svg class="icon" aria-hidden="true" data-viewBox="50 0 924 924" viewBox="50 0 924 924"><use xlink:href="#icon-user"></use></svg></div><div class="c-blue">登录</div></a>
						<a href="javascript:;" class="signup-loader"><div class="badg mb6 toggle-radius c-green"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-signup"></use></svg></div><div class="c-green">注册</div></a>
						<a rel="nofollow" href="<?= joe_user_auth_url('resetpassword') ?>"><div class="badg mb6 toggle-radius c-purple"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-user_rp"></use></svg></div><div class="c-purple">找回密码</div></a>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		<div class="mobile-nav-widget"></div>
	</nav>
	<div class="fixed-body" data-toggle-class="mobile-navbar-show" data-target="body"></div>
</div>