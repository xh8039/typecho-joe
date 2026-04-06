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
?>
<div class="header-slider-card container">
	<div class="<?= $this->options->joe_header_slider_card_option_show_widget_bg ? 'zib-widget padding-10' : '' ?>">
		<div class="flex jse flex-row gutters-5 flex-col-sm-2">
			<?php
			foreach ($cards as $key => $card) {
				$link = joe_externa_to_internal_link($card['url'] ?? 'javascript:;');
			?>
				<div class="<?= $this->options->joe_header_slider_card_option_show_widget_bg ? 'relative-h' : 'flex1' ?>">
					<a class="main-color" rel="<?= $link['rel'] ?>" target="<?= $link['target'] ?>" href="<?= $link['url'] ?>">
						<div class="icon-cover-card flex ac <?= $this->options->joe_header_slider_card_option_show_widget_bg ? 'padding-10' : 'zib-widget' ?>">
							<div class="icon-cover-icon badg cir <?= $card['color'] ?> <?= $this->options->joe_header_slider_card_option_icon_radius ? '' : 'radius4' ?>" style="font-size: 25px;">
								<?= joe_icon_html($card['icon'], ['svg' => 'icon em09', 'i' => 'em09']) ?>
							</div>
							<div class="icon-cover-desc ml10 flex1 px12-sm">
								<div class="em12 text-ellipsis font-bold"><?= $card['title'] ?></div>
								<div class="muted-color mt6 text-ellipsis"><?= $card['description'] ?></div>
							</div>
						</div>
					</a>
				</div>
			<?php
			}
			?>
		</div>
	</div>
</div>