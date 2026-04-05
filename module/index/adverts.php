<?php

/**
 * 广告模块
 */

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}

$index_ad = joe_optionMulti($this->options->JIndex_Ad);
if (!empty($index_ad) && !joe_detect_spider()) {
?>
	<div class="widget-graphic-cover mb20">
		<div class="box-body notop">
			<div class="title-theme"><?= empty($this->options->JIndex_Ad_Title) ? '推广宣传' : $this->options->JIndex_Ad_Title ?></div>
		</div>
		<div style="--font-size:18px;">
			<div class="row gutters-5">
				<?php
				foreach ($index_ad as $advert) {
					$link = joe_externa_to_internal_link($advert[1]);
				?>
					<div class="col-sm-3 col-xs-6">
						<a <?= empty($advert[1]) ? '' : 'href="' . $link['url'] . '" target="' . $link['target'] . '"' ?> rel="<?= $link['rel'] ?>">
							<div class="graphic hover-zoom-img noshadow mb10 " style="padding-bottom: 20%!important;">
								<img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" class="fit-cover lazyload" data-src="<?= $advert[0] ?>" src="<?= joe_lazyload_url() ?>" alt="<?= $advert[2] ?? '' ?>">
								<?php
								if (!empty($advert[2])) {
								?>
									<div class="absolute graphic-mask" style="opacity: 0.1;"></div>
									<div class="abs-center text-center graphic-text this-font"><?= $advert[2] ?></div>
								<?php
								}
								?>
							</div>
						</a>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
<?php
}
?>