<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
joe_header_cache(3600);
if ($this->is('author')) return $this->need('module/author.php');
if ($this->is('category')) return $this->need('module/category.php');
if ($this->is('tag')) return $this->need('module/tag.php');
if ($this->is('search')) return $this->need('module/search.php');
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
						while ($article = $this->next()) {
							if ($this->options->joe_post_list_mode === 'list') {
								?><posts class="posts-item list ajax-item flex">
								<div class="post-graphic"><div class="item-thumbnail"><a href="<?= joe_root_relative_link($this->permalink) ?>"><img onerror="Joe.thumbnailError(this)" referrerpolicy="no-referrer" rel="noreferrer" src="<?= joe_lazyload_url(); ?>" data-src="<?= joe_thumbnails_url($this)[0] ?>" alt="<?php $this->title() ?>-<?php $this->options->title(); ?>" class="lazyload fit-cover radius8"></a></div></div>
								<div class="item-body flex xx flex1 jsb">
									<h2 class="item-heading"><a href="<?= joe_root_relative_link($this->permalink) ?>"><?php $this->title() ?></a></h2>
									<div class="item-excerpt muted-color text-ellipsis mb6"><?= joe_get_abstract($this) ?></div>
									<div>
										<div class="item-tags scroll-x no-scrollbar mb6"><?= joe_get_archive_tags($this) ?></div>
										<div class="item-meta muted-2-color flex jsb ac">
											<item class="meta-author flex ac"><a href="<?= $this->author->permalink ?>"><span class="avatar-mini"><img alt="<?= $this->author->screenName ?>的头像-<?php $this->options->title() ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($this->author->mail) ?>" class="lazyload avatar avatar-id-<?= $this->author->uid ?>"></span></a><span class="hide-sm ml6"><?= $this->author->screenName ?></span><span title="<?= $this->date('Y-m-d H:i:s') ?>" class="icon-circle"><?= joe_dateWord($this->dateWord) ?></span></item>
											<div class="meta-right">
												<item class="meta-comm"><a rel="nofollow" data-toggle="tooltip" title="去评论" href="<?= joe_root_relative_link($this->permalink) ?>#respond"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?php $this->commentsNum('%d') ?></a></item>
												<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg><?= number_format($this->views); ?></item>
												<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= number_format($this->agree) ?></item>
											</div>
										</div>
									</div>
								</div>
								</posts><?php
							}
							if ($this->options->joe_post_list_mode === 'card') {
								?><posts class="posts-item card ajax-item">
									<div class="item-thumbnail"><a href="<?= joe_root_relative_link($this->permalink) ?>"><img onerror="Joe.thumbnailError(this)" referrerpolicy="no-referrer" rel="noreferrer" data-thumb="default" src="<?= joe_lazyload_url(); ?>" data-src="<?= joe_thumbnails_url($this)[0] ?>" alt="<?= $this->title ?>-<?= $this->options->title ?>" class="lazyload fit-cover radius8"></a></div>
									<div class="item-body">
										<h2 class="item-heading"><a href="<?= joe_root_relative_link($this->permalink) ?>"><?= $this->title ?></a></h2>
										<div class="item-tags scroll-x no-scrollbar mb6"><?= joe_get_archive_tags($this) ?></div>
										<div class="item-meta muted-2-color flex jsb ac">
											<item class="meta-author flex ac"><a href="<?= $this->author->permalink ?>"><span class="avatar-mini"><img alt="<?= $this->author->screenName ?>的头像-<?= $this->options->title ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($this->author->mail) ?>" class="lazyload avatar avatar-id-<?= $this->author->uid ?>"></span></a><span title="<?php $this->date('Y-m-d H:i:s') ?>" class="ml6"><?= joe_dateWord($this->dateWord) ?></span></item>
											<div class="meta-right">
												<item class="meta-comm"><a rel="nofollow" data-toggle="tooltip" title="去评论" href="<?= joe_root_relative_link($this->permalink) ?>#respond"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?php $this->commentsNum('%d') ?></a></item>
												<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg><?= number_format($this->views); ?></item>
												<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= number_format($this->agree) ?></item>
											</div>
										</div>
									</div>
								</posts><?php
							}
						}
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