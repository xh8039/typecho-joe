<?php
/**
 * Joe 主题专为商城、论坛、圈子博客、自媒体、资讯类的网站设计开发，采用简约优雅的设计风格让网站更具美感，创新的前端模块化功能配置和全面的前端用户功能，以及快捷的支付功能、全面的用户功能以及强大的社区论坛功能使Joe主题成为更适合现代化网站的优雅主题！<a target="_blank" href="https://qm.qq.com/q/CtGxRbvHdm">访问官网</a>
 * 
 * @package Joe主题
 * @author 易航
 * @version 2.1
 * @link http://blog.yihang.info
 * @Email 2136118039@qq.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
if ($this->request->getHeader('x-requested-with') === 'XMLHttpRequest') {
	return $this->need('module/index/list.php');
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