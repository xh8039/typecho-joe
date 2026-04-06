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
if ($this->request->getHeader('x-requested-with') === 'XMLHttpRequest') {
	return $this->need('module/archive/search/content.php');
}
joe_header_cache(3600);
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php $this->need('module/head.php'); ?>
</head>

<body class="search search-results <?= joe_body_class('search') ?>">
	<?php $this->need('module/header.php'); ?>
	<main class="container">
		<div class="content-wrap">
			<div class="content-layout">
				<?php
				$this->need('module/archive/search/search.php');
				$this->need('module/archive/search/content.php');
				?>
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>