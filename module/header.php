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
$this->need('module/loading/animation.php');
$show_slide = false;
if (in_array($this->getArchiveType(), (array) $this->options->joe_header_slider_show)) {
	$showTypes = (array) $this->options->joe_header_slider_show_type;
	if ((in_array('pc', $showTypes) && joe_is_pc()) || (in_array('mobile', $showTypes) && joe_is_mobile())) {
		$show_slide = true;
	}
}
?>
<header class="header header-layout-1 <?= $show_slide ? 'show-slide' : '' ?>">
	<nav class="navbar navbar-top center">
		<div class="container-fluid container-header">
			<?php $this->need('module/navbar/pc/header.php') ?>
			<div class="collapse navbar-collapse">
				<?php
				$this->need('module/navbar/pc/nav.php');
				$this->need('module/navbar/pc/form.php');
				?>
			</div>
		</div>
	</nav>
</header>
<?php
if (!$this->is('search')) $this->need('module/navbar/search/container.php');
$this->need('module/header/mobile.php');
require $this->themeDir . 'module/header/slider/index.php';