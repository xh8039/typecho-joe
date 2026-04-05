<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
joe_header_cache(3600);
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php
	$this->need('module/head.php');
	// if (!empty($this->options->JPostMetaReferrer)) echo '<meta name="referrer" content="' . $this->options->JPostMetaReferrer . '">';
	?>
</head>

<body class="wp-singular post-template-default single single-post postid-<?= $this->cid ?> single-format-standard <?= joe_body_class('post') ?>">
	<?php $this->need('module/header.php'); ?>
	<main role="main" class="container">
		<div class="content-wrap">
			<div class="content-layout">
				<?php
				// $this->need('module/post/image.php');
				$this->need('module/post/breadcrumb.php');
				$this->need('module/post/article.php');
				$this->need('module/post/motto.php');
				$this->need('module/post/user-card.php');
				$this->need('module/post/pagenav.php');
				$this->need('module/single/related.php');
				$this->need('module/single/comment.php');
				?>
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>