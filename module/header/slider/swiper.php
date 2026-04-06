<div class="relative zib-slider">
	<?php
	$slide_attrs = joe_html_attributes([
		'data-direction' => $this->options->joe_header_slider_option_direction,
		'data-effect' => $this->options->joe_header_slider_option_effect,
		'data-loop' => $this->options->joe_header_slider_option_loop,
		'data-autoplay' => $this->options->joe_header_slider_option_autoplay,
		'data-interval' => $this->options->joe_header_slider_option_interval,
		'data-spaceBetween' => $this->options->joe_header_slider_option_spacebetween,
		'data-speed' => $this->options->joe_header_slider_option_speed,
	]);
	?>
	<div class="new-swiper slide-index slide-header <?= empty($this->options->joe_header_slider_option_scale_height) ? '' : 'scale-height' ?>" <?= $slide_attrs ?> style="<?= joe_header_slider_swiper_height() ?>">
		<div class="swiper-wrapper">
			<?php
			$slider_background_list = joe_option_multi($this->options->joe_header_slider_background, ['keys' => ['background', 'url', 'title', 'description']]);
			foreach ($slider_background_list as $key => $slider) {
				$link = joe_externa_to_internal_link($slider['url'] ?? 'javascript:;');
				if (joe_url_is_video($slider['background'])) {
					if (joe_is_mobile()) continue;
					?>
					<div class="swiper-slide slide-background-video"><span><video autoplay loop muted class="fit-cover radius8 lazyload " data-src="<?= joe_ltrim($slider['background'], 'video:') ?>" src=""></video><div class="absolute"></div><?php joe_header_slider_text($slider) ?></span></div>
					<?php
				} else {
					?>
					<div class="swiper-slide "><a rel="<?= $link['rel'] ?>" target="<?= $link['target'] ?>" href="<?= $link['url'] ?>"><img referrerpolicy="no-referrer" rel="noreferrer" class="radius8 lazyload swiper-lazy" data-src="<?= $slider['background'] ?>" src="<?= joe_theme_url('assets/img/thumbnail-lg.svg') ?>" alt="<?= $slider['title'] ?? '幻灯片' ?>-<?= $this->options->title ?>"><?php joe_header_slider_text($slider) ?></a></div>
					<?php
				}
			}
			?>
		</div>
		<?php
		if ($this->options->joe_header_slider_option_button) echo '<div class="swiper-button-prev"></div><div class="swiper-button-next"></div>';
		if ($this->options->joe_header_slider_option_pagination) echo '<div class="swiper-pagination kaoyou"></div>';
		?>
	</div>
</div>