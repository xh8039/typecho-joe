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

?>
<div class="modal fade" id="modal_signout" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" style="" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div style="padding: 1px;">
					<div class="modal-colorful-header colorful-bg jb-yellow">
						<button class="close" data-dismiss="modal">
							<svg class="ic-close" aria-hidden="true">
								<use xlink:href="#icon-close"></use>
							</svg>
						</button>
						<div class="colorful-make"></div>
						<div class="text-center">
							<div class="em2x">
								<svg class="icon" aria-hidden="true">
									<use xlink:href="#icon-signout"></use>
								</svg>
							</div>
							<div class="mt10 em12 padding-w10">退出登录</div>
						</div>
					</div>
					<div>
						<div class="ml10">
							<h4>您好！<?= $this->user->screenName ?></h4>
							<p class="c-red">确认要退出当前登录吗？</p>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-buts but-average">
				<a type="button" data-dismiss="modal" class="but" href="javascript:;">取消</a>
				<a type="button" class="but c-red" href="<?= $this->options->logoutUrl ?>">确认退出</a>
			</div>
		</div>
	</div>
</div>