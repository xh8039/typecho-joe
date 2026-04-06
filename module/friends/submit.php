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
<div class="modal fade" id="submit-links-modal" tabindex="-1" role="dialog" aria-hidden="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="">
			<div class="modal-body">
				<div class="mb20">
					<button class="close" data-dismiss="modal">
						<svg class="ic-close" aria-hidden="true">
							<use xlink:href="#icon-close"></use>
						</svg>
					</button>
					<b class="modal-title flex ac"><span class="toggle-radius mr10 b-theme"><i class="fa fa-pencil-square-o"></i></span><?= $this->options->JFriends_Submit_Button_Text ?></b>
				</div>
				<div class="muted-box em09"><?= $this->options->JFriends_Submit_Description ?></div>
				<form class="form-horizontal mt10">
					<div class="row gutters-5">
						<div class="col-sm-6 mb10">
							<div class="em09 muted-2-color mb6">网站名称（必填）</div>
							<input type="text" class="form-control" name="title" placeholder="请输入网站名称" required>
						</div>
						<div class="col-sm-6 mb10">
							<div class="em09 muted-2-color mb6">网站地址（必填）</div>
							<input type="url" class="form-control" name="url" placeholder="http://..." required>
						</div>
						<div class="col-sm-6 mb10">
							<div class="em09 muted-2-color mb6">站长邮箱（必填）</div>
							<input type="email" class="form-control" name="email" placeholder="请输入站长邮箱，用于通知" required>
						</div>
						<div class="col-sm-6 mb10">
							<div class="em09 muted-2-color mb6">网站LOGO</div>
							<input type="url" class="form-control" name="logo" placeholder="http://...">
						</div>
						<div class="col-sm-12 mb10">
							<div class="em09 muted-2-color mb6">网站简介</div>
							<input type="text" class="form-control" name="description" placeholder="一句话介绍网站">
						</div>
						<!-- <div class="col-sm-12 mb10">
							<div class="em09 muted-2-color mb6">网站类别</div>
							<div class="form-select">
								<select name="link_category" class="form-control">
									<option value="9">友情链接</option>
								</select>
							</div>
						</div> -->
					</div>
					<div class="col-sm-9" style="max-width: 300px;">
						<input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
					</div>
					<div class="text-right edit-footer"><button onclick="zib_ajax($(this))" type="button" class="but c-blue padding-lg" name="submit"><i class="fa fa-check" aria-hidden="true"></i>确认提交</button></div>
					<input type="hidden" id="_wpnonce" name="_wpnonce" value="720babe259" />
					<input type="hidden" name="action" value="frontend_links_submit">
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	//提交
	// $('body').on('click', '#submit-links-modal [name=submit]', function() {
	// 	zib_ajax($(this), 0, function(n) {
	// 		n.error || n.hide_modal;
	// 	});
	// 	return !1;
	// });
</script>