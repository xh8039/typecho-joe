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
$tab = $this->request->get('tab', 'post');
$path_info = $this->request->getPathInfo();
$path_info_explode = explode('/', $path_info);
$uid = $path_info_explode[2];
$CommentsNum = joe_number_word(joe_user_comment_count($uid));
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
			<?php $this->need('module/archive/author/header.php'); ?>
			<div class="fluid-widget"></div>
			<div class="author-tab zib-widget">
				<div class="affix-header-sm" offset-top="7">
					<ul class="list-inline scroll-x mini-scrollbar tab-nav-theme">
						<li <?= $tab === 'post' ? 'class="active"' : '' ?>><a data-route="?tab=post" href="?tab=post" data-toggle="tab" data-ajax data-target="#author-tab-post">文章<count class="opacity8 ml3"><?= $this->getTotal() ?></count></a></li>
						<li <?= $tab === 'favorite' ? 'class="active"' : '' ?>><a data-route="?tab=favorite" href="?tab=favorite" data-toggle="tab" data-ajax data-target="#author-tab-favorite">收藏<count class="opacity8 ml3">0</count></a></li>
						<li <?= $tab === 'comment' ? 'class="active"' : '' ?>><a data-route="?tab=comment" href="?tab=comment" data-toggle="tab" data-ajax data-target="#author-tab-comment">评论<count class="opacity8 ml3"><?= $CommentsNum ?></count></a></li>
						<li <?= $tab === 'follow' ? 'class="active"' : '' ?>><a data-route="?tab=follow" href="?tab=follow" data-toggle="tab" data-ajax data-target="#author-tab-follow">粉丝<count class="opacity8 ml3">0</count></a></li>
					</ul>
				</div>
				<div class="tab-content main-tab-content">
					<div class="ajaxpager tab-pane fade <?= $tab === 'post' ? 'in active' : '' ?>" id="author-tab-post"><?php require $this->themeDir . 'module/archive/author/article.php'; ?></div>
					<div class="ajaxpager tab-pane fade <?= $tab === 'favorite' ? 'in active' : '' ?>" id="author-tab-favorite"><?php $this->need('module/archive/author/favorite.php'); ?></div>
					<div class="ajaxpager tab-pane fade <?= $tab === 'comment' ? 'in active' : '' ?>" id="author-tab-comment"><?php require $this->themeDir . 'module/archive/author/comment.php'; ?></div>
					<div class="ajaxpager tab-pane fade <?= $tab === 'follow' ? 'in active' : '' ?>" id="author-tab-follow"><?php $this->need('module/archive/author/follow.php'); ?></div>
				</div>
			</div>
		</div>
		<div class="container fluid-widget"></div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>