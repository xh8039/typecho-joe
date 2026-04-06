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
$icon_crid_list = joe_option_multi($this->options->JIndex_Icon_Card);
if (empty($icon_crid_list)) return;
?>
<div>
	<?= empty($this->options->JIndex_Icon_Card_Title) ? '' : '<div class="box-body notop"><div class="title-theme">' . $this->options->JIndex_Icon_Card_Title . '</div></div>' ?>
	<div class="mb10">
		<div class="row gutters-5">
			<?php
			foreach ($icon_crid_list as $value) {
				$icon_crid = joe_icon_crid_info($value);
				$link = joe_externa_to_internal_link($icon_crid['url']);
			?>
				<div class="col-sm-3 col-xs-6">
					<a class="main-color" href="<?= $link['url'] ?>" target="<?= $link['target'] ?>" rel="<?= $link['rel'] ?>">
						<div class="icon-cover-card flex ac zib-widget mb10">
							<div class="icon-cover-icon badg cir <?= $icon_crid['icon_class'] ?>" style="font-size: 25px;">
								<svg class="icon em09" aria-hidden="true">
									<use xlink:href="#<?= $icon_crid['icon'] ?>"></use>
								</svg>
							</div>
							<div class="icon-cover-desc ml10 flex1 px12-sm">
								<div class="em12 text-ellipsis font-bold"><?= $icon_crid['title'] ?></div>
								<?= $icon_crid['description'] ? '<div class="muted-color mt6 text-ellipsis">' . $icon_crid['description'] . '</div>' : null ?>
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