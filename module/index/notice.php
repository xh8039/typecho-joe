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

$joe_index_notice = $this->options->joe_index_notice;
if (empty($joe_index_notice)) return;
?>
<div class="container fluid-widget">
	<div class="theme-box">
		<div class="swiper-bulletin <?= $this->options->joe_index_notice_theme ?> radius">
			<div class="new-swiper" data-interval="5000" data-direction="vertical" data-loop="true" data-autoplay="1">
				<div class="swiper-wrapper">
					<?php
					$joe_index_notice_list = joe_option_multi($joe_index_notice);
					foreach ($joe_index_notice_list as $notice) {
						$link = joe_externa_to_internal_link($notice['2']);
					?>
						<div class="swiper-slide  notice-slide"><a class="text-ellipsis" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>" rel="<?= $link['rel'] ?>"><div class="relative bulletin-icon mr6"><i class="abs-center fa <?= $notice['0'] ?>"></i></div><?= $notice['1'] ?></a></div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>