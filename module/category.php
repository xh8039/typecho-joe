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
	<?php $this->need('module/head.php'); ?>
</head>

<body class="archive category category-<?= $this->getArchiveSlug() ?> category-<?= $this->pageRow->mid ?> <?= joe_body_class('category') ?>">
	<?php $this->need('module/header.php'); ?>
	<main role="main" class="container">
		<div class="content-wrap">
			<div class="content-layout">
				<div class="zib-widget">
					<h4 class="title-h-left"><i class="fa fa-folder-open em12 mr10 ml6" aria-hidden="true"></i><?= $this->archiveTitle; ?><span class="icon-spot">共<?= $this->getTotal(); ?>篇</span></h4>
					<?php
					if ($this->user->group === 'administrator') {
						$description = empty($this->archiveDescription) ? '请在Typecho后台-管理-分类中添加分类描述！' : $this->archiveDescription;
						?>
						<div class="muted-2-color"><?= $description ?> <span class="admin-edit" data-toggle="tooltip" title="编辑此分类"><a target="_blank" href="<?= $this->options->adminUrl . 'category.php?mid=' . $this->pageRow->mid ?>">[编辑]</a></span></div>
						<?php
					} else if (!empty($this->archiveDescription)) {
						?>
						<div class="muted-2-color"><?= $this->archiveDescription ?></div>
						<?php
					}
					?>
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
						while ($article = $this->next()) {
							echo joe_article_item($this, ['category'=>false]);
						}
					} else {
						?>
						<div class="text-center ajax-item" style="padding:100px 0;">
							<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null-post.svg') ?>">
							<p style="margin-top:100px;" class="em09 muted-3-color separator">暂无内容</p>
						</div>
					<?php
					}
					$this->need('module/pagenav.php') ?>
				</div>
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>

</html>