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
?><div>
	<div class="box-body notop">
		<div class="title-theme">热榜文章</div>
	</div>
	<div class="zib-widget hot-posts">
		<?php
		$this->widget('Widget_Contents_Hot@Aside', 'action=aside&pageSize=' .intval($this->options->joe_sidebar_hot_post_num))->to($item);
		$index = 1;
		$badge_color_list = ['','', 'jb-red', 'jb-yellow'];
		while ($item->next()) {
			if ($index === 1) {
			?>
				<div class="relative">
					<a href="<?= joe_relative_url($item->permalink); ?>">
						<div class="graphic hover-zoom-img" style="padding-bottom: 60%!important;">
							<img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" src="<?= joe_lazyload_url() ?>" data-src="<?= joe_article_thumbnails_url($item)[0] ?>" alt="<?= $item->title ?>-<?= $this->options->title ?>" class="lazyload fit-cover radius8">
							<div class="absolute linear-mask"></div>
							<div class="abs-center left-bottom box-body"><div class="mb6"><span class="badg b-theme badg-sm"><?= $item->views ?>人已阅读</span></div><?= $item->title ?></div>
						</div>
					</a>
					<badge class="img-badge left hot em12"><i>TOP1</i></badge>
				</div>
			<?php
			} else {
			?>
				<div class="flex mt15 relative hover-zoom-img">
					<a href="<?= joe_relative_url($item->permalink); ?>">
						<div class="graphic"><img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" data-thumb="default" src="<?= joe_lazyload_url() ?>" data-src="<?= joe_article_thumbnails_url($item)[0] ?>" alt="<?= $item->title ?>-<?= $this->options->title ?>" class="lazyload fit-cover radius8"></div>
					</a>
					<div class="term-title ml10 flex xx flex1 jsb">
						<div class="text-ellipsis-2"><a class="" href="<?= joe_relative_url($item->permalink); ?>"><?= $item->title ?></a></div>
						<div class="px12 muted-3-color text-ellipsis flex jsb"><span><i class="fa fa-clock-o mr3" aria-hidden="true"></i><?= joe_date_word($item->dateWord) ?></span><span><?= $item->views ?>人已阅读</span></div>
					</div>
					<badge class="img-badge left hot <?= isset($badge_color_list[$index]) ? $badge_color_list[$index] : 'b-gray' ?>"><i>TOP<?= $index ?></i></badge>
				</div>
			<?php
			}
			$index++;
		}
		?>
	</div>
</div>