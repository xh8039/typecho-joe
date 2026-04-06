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
joe_header_cache(3600);
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php $this->need('module/head.php'); ?>
</head>

<body class="wp-singular post-template-default single single-post postid-<?= $this->cid ?> single-format-standard <?= joe_body_class('post') ?>">
	<?php $this->need('module/header.php'); ?>
	<main role="main" class="container">
		<div class="content-wrap">
			<div class="content-layout">
				<?php
				// $this->need('module/article/image.php');
				if ($this->options->joe_article_image_cover && !empty(joe_article_thumbnail_url($this))) {
					$this->need('module/article/cover.php');
				} else {
					$this->need('module/article/breadcrumb.php');
				}
				$this->need('module/article/article.php');
				$this->need('module/article/motto.php');
				$this->need('module/article/user-card.php');
				$this->need('module/article/pagenav.php');
				$this->need('module/article/related.php');
				$this->need('module/single/comment.php');
				?>
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>