<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
joe_header_cache(3600);
$this->need('module/single/pjax.php');
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php $this->need('module/head.php') ?>
</head>

<body class="wp-singular page-template-default page page-id-2 <?= joe_body_class('page') ?>">
	<?php $this->need('module/header.php'); ?>
	<main class="container page-id-2">
		<div class="content-wrap">
			<div class="content-layout">
				<article class="article page-article main-bg theme-box box-body radius8 main-shadow">
					<div class="wp-posts-content">
						<?= joe_parse_content($this); ?>
					</div>
				</article>
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>