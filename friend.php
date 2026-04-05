<?php

/**
 * 友链
 *
 * @package custom
 *
 **/

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
joe_header_cache(3600);
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php $this->need('module/head.php') ?>
</head>

<body class="wp-singular page-template page-template-pages page-template-links page-template-pageslinks-php page page-id-49 <?= joe_body_class('friend') ?>">
	<?php $this->need('module/header.php'); ?>
	<main class="container">
		<div class="content-wrap">
			<div class="content-layout">
				<?php if ($this->options->JFriends_Search == 'on') $this->need('module/friends/search.php'); ?>
				<div class="links-page-container mb20">
					<?php
					if ($this->options->JFriends_Spider_Hide != 'on' || !joe_detect_spider()) $this->need('module/friends/link.php');
					if (!empty($this->options->JFriends_Submit_Button_Text)) {
					?>
						<div class="mt20">
							<a class="padding-h10 hollow but c-theme btn-block text-ellipsis" href="#submit-links-modal" data-toggle="modal"><?= $this->options->JFriends_Submit_Button_Text ?></a>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php
	if (!empty($this->options->JFriends_Submit_Button_Text)) $this->need('module/friends/submit.php');
	$this->need('module/footer.php');
	?>
</body>

</html>