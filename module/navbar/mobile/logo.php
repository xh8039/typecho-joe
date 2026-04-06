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

?>
<div class="flex jsb ac mb20">
	<div class="navbar-logo"><img src="<?= joe_logo_url() ?>" switch-src="<?= joe_logo_url('dark') ?>" alt="<?= $this->options->title ?>"></div>
	<button type="button" data-toggle-class="mobile-navbar-show" data-target="body" class="close"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
</div>