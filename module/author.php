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
	<?php $this->need('module/head.php') ?>
	<style>
		.author-header .avatar-img .avatar {
			background: var(--main-bg-color);
		}
	</style>
</head>

<body class="archive author author-yihang author-1 <?= joe_body_class('author') ?>">
	<?php $this->need('module/header.php'); ?>
	<main>
		<div class="container">
			<?php $this->need('module/author/header.php'); ?>
			<div class="fluid-widget"></div>
			<div class="author-tab zib-widget">
				<div class="affix-header-sm" offset-top="7">
					<ul class="list-inline scroll-x mini-scrollbar tab-nav-theme">
						<?php $tab = $this->request->get('tab','post'); ?>
						<li <?= $tab === 'post' ? 'class="active"' : '' ?>><a data-route="?tab=post" href="?tab=post" data-toggle="tab" data-ajax data-target="#author-tab-post">文章<count class="opacity8 ml3"><?= $this->getTotal() ?></count></a></li>
						<li <?= $tab === 'favorite' ? 'class="active"' : '' ?>><a data-route="?tab=favorite" href="?tab=favorite" data-toggle="tab" data-ajax data-target="#author-tab-favorite">收藏<count class="opacity8 ml3">0</count></a></li>
						<li <?= $tab === 'comment' ? 'class="active"' : '' ?>><a data-route="?tab=comment" href="?tab=comment" data-toggle="tab" data-ajax data-target="#author-tab-comment">评论<count class="opacity8 ml3">0</count></a></li>
						<li <?= $tab === 'follow' ? 'class="active"' : '' ?>><a data-route="?tab=follow" href="?tab=follow" data-toggle="tab" data-ajax data-target="#author-tab-follow">粉丝<count class="opacity8 ml3">0</count></a></li>
					</ul>
				</div>
				<div class="tab-content main-tab-content">
					<div class="ajaxpager tab-pane fade <?= $tab === 'post' ? 'in active' : '' ?>" id="author-tab-post"><?php $this->need('module/author/article.php'); ?></div>
					<div class="ajaxpager tab-pane fade <?= $tab === 'favorite' ? 'in active' : '' ?>" id="author-tab-favorite"><?php $this->need('module/author/favorite.php'); ?></div>
					<div class="ajaxpager tab-pane fade <?= $tab === 'comment' ? 'in active' : '' ?>" id="author-tab-comment"><?php $this->need('module/author/comment.php'); ?></div>
					<div class="ajaxpager tab-pane fade <?= $tab === 'follow' ? 'in active' : '' ?>" id="author-tab-follow"><?php $this->need('module/author/follow.php'); ?></div>
				</div>
			</div>
		</div>
		<div class="container fluid-widget"></div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>