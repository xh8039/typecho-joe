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

if ($show_slide) {
	if ((in_array('pc', (array) $this->options->joe_header_slider_filter_blur) && joe_is_pc()) || (in_array('mobile', (array) $this->options->joe_header_slider_filter_blur) && joe_is_mobile())) {
		$filter_blur = 'filter-blur';
	} else {
		$filter_blur = '';
	}
	echo '<div class="header-slider-container relative mb20 card-4 ' . $filter_blur . '">';

	$this->need('module/header/slider/swiper.php');

	if ((in_array('pc', (array) $this->options->joe_header_slider_search) && joe_is_pc()) || (in_array('mobile', (array) $this->options->joe_header_slider_search) && joe_is_mobile())) {
		$this->need('module/header/slider/search.php');
	}

	$cards = joe_option_multi($this->options->joe_header_slider_card_option_cards, ['keys' => ['icon', 'color', 'title', 'description', 'url']]);
	if ($cards) require $this->themeDir . 'module/header/slider/card.php';

	echo '</div>';
}
