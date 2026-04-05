<?php

/**
 * 热门文章模块
 */

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
if (joe_is_mobile()) $this->options->JIndexHotArticleNumber = $this->options->JIndexMobileHotArticleNumber;
if (is_numeric($this->options->JIndexHotArticleNumber) && $this->options->JIndexHotArticleNumber < 1) return;
$this->widget('Widget_Contents_Hot@Index', 'action=index&pageSize=' . $this->options->JIndexHotArticleNumber)->to($item); ?>
<div class="widget-main-post mb20 style-card">
	<div class="box-body notop">
		<div class="title-theme">热门文章</div>
	</div>
	<div class="widget-ajaxpager">
		<?php while ($item->next()) : ?><posts class="posts-item card ajax-item">
				<div class="item-thumbnail"><a href="<?= joe_root_relative_link($item->permalink); ?>"><img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" data-thumb="default" src="<?= joe_lazyload_url(); ?>" data-src="<?= joe_thumbnails_url($item)[0]; ?>" alt="<?php $item->title(); ?>-<?php $this->options->title(); ?>" class="lazyload fit-cover radius8"></a></div>
				<div class="item-body">
					<h2 class="item-heading"><a href="<?= joe_root_relative_link($item->permalink); ?>"><?php $item->title(); ?></a></h2>
					<div class="item-tags scroll-x no-scrollbar mb6"><?= joe_get_archive_tags($item);?></div>
					<div class="item-meta muted-2-color flex jsb ac">
						<item class="meta-author flex ac"><a href="<?= $item->author->permalink ?>"><span class="avatar-mini"><img referrerpolicy="no-referrer" rel="noreferrer" alt="<?= $item->author->screenName ?>的头像-<?php $this->options->title() ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($item->author->mail) ?>" class="lazyload avatar avatar-id-<?= $this->user->uid ?>"></span></a><span title="<?= $item->date('Y-m-d H:i:s') ?>" class="ml6"><?= joe_dateWord($item->dateWord) ?></span></item>
						<div class="meta-right">
							<item class="meta-comm"><a rel="nofollow" data-toggle="tooltip" title="去评论" href="<?= joe_root_relative_link($item->permalink); ?>#comments"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg> <?php $item->commentsNum('%d') ?></a></item>
							<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg> <?= number_format($item->views); ?></item>
							<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg> <?= number_format($item->agree) ?></item>
						</div>
					</div>
				</div>
			</posts><?php endwhile; ?>
	</div>
</div>