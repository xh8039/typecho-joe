<?php

/**
 * 环境要求：<br>PHP 8+<br>Typecho 1.3<br>主题问题可 <a href="https://wpa.qq.com/msgrd?v=3&uin=2136118039&site=qq&menu=yes" target="_blank">联系易航</a> 解决<br>易航QQ：2136118039<br><font color="green">主题官方通知群：<a target="_blank" href="https://qm.qq.com/q/CtGxRbvHdm">782778569</a></font>
 * 
 * @package Joe再续前缘
 * @author 易航
 * @version 2.0
 * @link http://blog.yihang.info
 */

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
joe_header_cache(3600);
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php $this->need('module/head.php'); ?>
</head>

<body class="home blog <?= joe_body_class('index') ?>">
	<?php
	$this->need('module/header.php');
	$this->need('module/index/notice.php');
	?>
	<main role="main" class="container">
		<div class="content-wrap">
			<div class="content-layout">
				<?php
				$this->need('module/index/carousel.php');
				$this->need('module/index/iconcard.php');
				$this->need('module/index/recommend.php');
				$this->need('module/index/hot.php');
				$this->need('module/index/adverts.php');
				$this->need('module/index/list.php');
				$this->need('module/index/friend.php');
				?>
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>