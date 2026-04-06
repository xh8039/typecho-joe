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

?><div class="navbar-form navbar-right hide show-nav-but" style="margin-right:-10px;"><a data-toggle-class data-target=".nav.navbar-nav" href="javascript:;" class="but"><svg class="" aria-hidden="true" data-viewBox="0 0 1024 1024" viewBox="0 0 1024 1024"><use xlink:href="#icon-menu_2"></use></svg></a></div>
<div class="navbar-form navbar-right navbar-but"><a rel="nofollow" class="newadd-btns but nowave jb-blue radius btn-newadd" href="<?= $this->user->hasLogin() ? $this->options->adminUrl . 'write-post.php' : joe_user_auth_url('login') ?>"><i class="fa fa-fw fa-pencil"></i>发布</a></div>
<div class="navbar-form navbar-right">
	<?php
	if ($this->options->joe_theme_mode_switch == 'on') {
		?><a href="javascript:;" class="toggle-theme toggle-radius"><i class="fa fa-toggle-theme"></i></a><?php
	}
	if ($this->user->hasLogin()) {
		?><a rel="nofollow" href="<?= $this->options->adminUrl . 'manage-comments.php' ?>" class="msg-news-icon ml10"><span class="toggle-radius msg-icon"><i class="fa fa-bell-o" aria-hidden="true"></i></span></a><?php
	}
	?>
</div>
<div class="navbar-form navbar-right">
	<ul class="list-inline splitters relative">
		<li><a href="javascript:;" class="btn"><svg class="icon" aria-hidden="true" data-viewBox="50 0 924 924" viewBox="50 0 924 924"><use xlink:href="#icon-user"></use></svg></a><ul class="sub-menu"><div class="padding-10"><?php $this->need('module/navbar/pc/user.php') ?></div></ul></li>
		<li class="relative"><a class="main-search-btn btn nav-search-btn" href="javascript:;"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-search"></use></svg></a></li>
	</ul>
</div>