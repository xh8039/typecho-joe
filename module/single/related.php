<?php
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
							<a href="<?= joe_root_relative_link($relatedPosts->permalink); ?>" title="<?php $relatedPosts->title(); ?>">
								<div class="graphic hover-zoom-img mb10 style-3" style="padding-bottom: 70%!important;">
									<img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" class="fit-cover lazyload" data-src="<?= joe_thumbnails_url($relatedPosts)[0] ?>" src="<?= joe_lazyload_url(); ?>" alt="<?php $relatedPosts->title(); ?>-<?php $this->options->title(); ?>">
									<div class="abs-center left-bottom graphic-text text-ellipsis"><?php $relatedPosts->title(); ?></div>
									<div class="abs-center left-bottom graphic-text">
										<div class="em09 opacity8"><?php $relatedPosts->title(); ?></div>
										<div class="px12 opacity8 mt6">
											<item><?= joe_dateWord($relatedPosts->dateWord) ?></item>
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