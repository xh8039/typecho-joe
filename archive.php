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
if ($this->is('author')) return $this->need('module/archive/author/index.php');
if ($this->is('category')) return $this->need('module/archive/category/index.php');
if ($this->is('tag')) return $this->need('module/archive/tag/index.php');
if ($this->is('search')) return $this->need('module/archive/search/index.php');
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php $this->need('module/head.php'); ?>
</head>

<body class="archive category category-tech category-4 <?= joe_body_class('archive') ?>">
	<?php $this->need('module/header.php'); ?>
	<main role="main" class="container">
		<div class="content-wrap">
			<div class="content-layout">
				<div class="zib-widget">
					<h4 class="title-h-left"><i class="fa fa-tags em12 mr10 ml6" aria-hidden="true"></i><?= $this->archiveTitle; ?><span class="icon-spot">共<?= $this->getTotal(); ?>篇</span>-<?= $this->archiveType ?></h4>
				</div>
				<div class="posts-row ajaxpager">
					<div class="ajax-option ajax-replace" win-ajax-replace="filter">
						<div class="flex ac">
							<div class="option-dropdown splitters-this-r dropdown flex0">排序</div>
							<ul class="list-inline scroll-x mini-scrollbar option-items">
								<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?cat=4&#038;orderby=modified">更新</a>
								<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?cat=4&#038;orderby=views">浏览</a>
								<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?cat=4&#038;orderby=like">点赞</a>
								<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?cat=4&#038;orderby=comment_count">评论</a>
							</ul>
						</div>
					</div>
					<div></div>
					<?php
					if ($this->have()) {
						while ($article = $this->next()) echo joe_article_item($this);
					} else {
						?>
						<div class="text-center ajax-item" style="padding:100px 0;">
							<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null-post.svg') ?>">
							<p style="margin-top:100px;" class="em09 muted-3-color separator">暂无内容</p>
						</div>
					<?php
					}
					?>
					<?php $this->need('module/pagenav.php') ?>
					<!-- <div class="pagenav ajax-pag">
						<span aria-current="page" class="page-numbers current">1</span>
						<a class="page-numbers" href="">2</a>
						<a class="next page-numbers" href="">
							<span class="hide-sm mr6">下一页</span>
							<i class="fa fa-angle-right em12"></i>
						</a>
					</div> -->
				</div>
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>