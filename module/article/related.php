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
$this->related(5)->to($relatedPosts);
if ($relatedPosts->have()) : ?>
	<div class="theme-box relates relates-thumb">
		<div class="box-body notop"><div class="title-theme">相关推荐</div></div>
		<div class="zib-widget">
			<div class="swiper-container swiper-scroll">
				<div class="swiper-wrapper">
					<?php while ($relatedPosts->next()) : ?>
						<div class="swiper-slide mr10">
							<a href="<?= joe_relative_url($relatedPosts->permalink); ?>" title="<?php $relatedPosts->title(); ?>">
								<div class="graphic hover-zoom-img mb10 style-3" style="padding-bottom: 70%!important;">
									<img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" class="fit-cover lazyload" data-src="<?= joe_article_thumbnails_url($relatedPosts)[0] ?>" src="<?= joe_lazyload_url(); ?>" alt="<?php $relatedPosts->title(); ?>-<?php $this->options->title(); ?>">
									<div class="abs-center left-bottom graphic-text text-ellipsis"><?php $relatedPosts->title(); ?></div>
									<div class="abs-center left-bottom graphic-text">
										<div class="em09 opacity8"><?php $relatedPosts->title(); ?></div>
										<div class="px12 opacity8 mt6">
											<item><?= joe_date_word($relatedPosts->dateWord) ?></item>
											<item class="pull-right"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg><?= joe_get_views($relatedPosts) ?></item>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php endwhile; ?>
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</div>
	</div>
<?php endif; ?>