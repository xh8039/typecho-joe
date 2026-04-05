<?php

/**
 * 轮播图模块
 */

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}

$carousel = [];
$carousel_text = $this->options->JIndex_Carousel;
$video = false;
if ($carousel_text) {
	$carousel_arr = joe_optionMulti($carousel_text, '/\R/', null);
	if (count($carousel_arr) > 0) {
		for ($i = 0; $i < count($carousel_arr); $i++) {
			if (is_numeric($carousel_arr[$i])) {
				$this->widget('Widget_Contents_Post@' . $carousel_arr[$i], 'cid=' . $carousel_arr[$i])->to($item);
				$img = trim(joe_thumbnails_url($item)[0]);
				$url = joe_root_relative_link($item->permalink);
				$title = $item->title;
			} else {
				$img = trim(explode("||", $carousel_arr[$i])[0] ?? '');
				$url = explode("||", $carousel_arr[$i])[1] ?? '';
				$title = explode("||", $carousel_arr[$i])[2] ?? '';
			}
			if (pathinfo($img, PATHINFO_EXTENSION) == 'mp4') $video = true;
			$carousel[] = array("img" => $img, "url" => trim($url), "title" => trim($title));
		};
	}
}
// if ($video) echo '<style>html .joe_index__banner>.swiper-container .item, html .joe_index__banner>.swiper-container {height: auto;}</style>';
?>
<?php if (count($carousel) > 0) : ?>
	<div class="mb20">
		<div class="relative zib-slider">
			<div class="new-swiper slide-widget scale-height" data-direction="horizontal" data-effect="slide" data-loop="true" data-autoplay="1" data-interval="4000" data-spaceBetween="15" style="--scale-height :35%">
				<div class="swiper-wrapper">
					<?php
					foreach ($carousel as $item) {
						$link = joe_externa_to_internal_link($item['url']);
					?>
						<div class="swiper-slide">
							<a target="<?= $link['target'] ?>" href="<?= $link['url'] ?>" rel="<?= $link['rel'] ?>">
								<span>
									<img referrerpolicy="no-referrer" rel="noreferrer" class="radius8 lazyload swiper-lazy" data-src="<?= $item['img'] ?>" onerror="Joe.thumbnailError(this,'<?= joe_theme_url('assets/img/thumbnail-lg.svg') ?>')" src="<?= joe_theme_url('assets/img/thumbnail-lg.svg') ?>" alt="<?= $item['title'] ?>">
								</span>
							</a>
						</div>
					<?php
					}
					?>
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
				<div class="swiper-pagination kaoyou "></div>
			</div>
		</div>
	</div>
<?php endif; ?>