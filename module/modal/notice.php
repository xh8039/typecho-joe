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

if (isset($_COOKIE['showed_system_notice']) && $_COOKIE['showed_system_notice'] == 'showed') return;
if ($this->options->joe_notice_policy == 'signin' && $this->user->hasLogin()) return;
$expires = is_numeric($this->options->joe_notice_expires) ? intval($this->options->joe_notice_expires) : 0;
$expires = $expires / 24;
?>
<div class="modal fade" id="modal-system-notice" tabindex="-1" role="dialog">
	<div class="modal-dialog <?= $this->options->joe_notice_size ?>" style="" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<?php
				if ($this->options->joe_notice_title_style == 'colorful') {
				?>
				<div style="padding: 1px;">
					<div class="modal-colorful-header colorful-bg <?= $this->options->joe_notice_title_class ?>">
						<button class="close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
						<div class="colorful-make"></div>
						<div class="text-center">
							<div class="em2x"><?= joe_icon_html($this->options->joe_notice_title_icon) ?></div>
							<div class="mt10 em12 padding-w10"><?= $this->options->joe_notice_title ?></div>
						</div>
					</div>
					<div><?= $this->options->joe_notice_content ?></div>
				</div>
				<?php
				}
				if ($this->options->joe_notice_title_style == 'default') {
				?>
				<button class="close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
				<h4><?= $this->options->joe_notice_title ?></h4>
				<div><?= $this->options->joe_notice_content ?></div>
				<?php
				}
				?>
			</div>
			<div class="modal-buts box-body notop text-right">
				<?php
				$buttons = joe_option_multi($this->options->joe_notice_button,['keys'=>['text','url','color']]);
				$radius = $this->options->joe_notice_button_radius ? 'radius' : '';
				foreach ($buttons as $button) {
					$link = joe_externa_to_internal_link($button['url']);
					$class = 'but ' . $radius . ' ' . $button['color'];
					echo '<a rel="'.$link['rel'].'" target="'.$link['target'].'" type="button" class="'.$class.'" href="'.$link['url'].'">'.$button['text'].'</a>';
				}
				?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	window.addEventListener('load', () => {
		setTimeout(()=> {
			$('#modal-system-notice').modal('show');
			<?= $expires ? '$.cookie("showed_system_notice", "showed", {path: "/",expires: ' . $expires . '});' : '' ?>
		}, 500);
	});
</script>