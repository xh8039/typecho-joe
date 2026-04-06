<div class="ajaxpager tab-pane fade <?= $tab_name == 'reward' ? 'in active' : '' ?>" id="user-tab-rewards">
	<?php
	if ($tab_name == 'reward') {
	?>
		<div class="ajax-item">
			<form class="set-rewards-form mini-upload zib-widget">
				<div class="padding-h10" style="max-width: 502px;margin: auto;">
					<div class="mb40">
						<div class="title-h-left">
							<b>设置打赏标题</b>
						</div>
						<div class="line-form">
							<input type="input" class="line-form-input" name="rewards_title" value="" placeholder="文章很赞！支持一下吧">
							<i class="line-form-line"></i>
						</div>
					</div>
					<div class="mb40">
						<div class="title-h-left">
							<b>设置收款码</b>
						</div>
						<p class="muted-2-color">选择您的收款码上传，支持jpg、gif、png格式，最大20M</p>
						<div class="flex ac">
							<label style="width: 100%;" class="pointer text-center">
								<div class="preview weixin upload-preview radius4" style="width: 140px;height: 140px;">
									<img style="width: 100%;" src="<?= joe_theme_url('assets/img/upload-add.svg') ?>" alt="点击上传收款码">
								</div>
								<div class="em09 c-blue">上传微信二维码</div>
								<input class="hide" type="file" zibupload="image_upload" data-preview=".preview.weixin" accept="image/gif,image/jpeg,image/jpg,image/png" data-tag="weixin" name="image_upload" action="image_upload">
							</label>
							<label style="width: 100%;" class="pointer text-center">
								<div class="preview alipay upload-preview radius4" style="width: 140px;height: 140px;">
									<img style="width: 100%;" src="<?= joe_theme_url('assets/img/upload-add.svg') ?>" alt="点击上传收款码">
								</div>
								<div class="em09 c-blue">上传支付宝二维码</div>
								<input class="hide" type="file" zibupload="image_upload" data-preview=".preview.alipay" accept="image/gif,image/jpeg,image/jpg,image/png" data-tag="alipay" name="image_upload" action="image_upload">
							</label>
						</div>
						<input type="hidden" name="user_id" value="1">
						<input type="hidden" name="action" value="user_set_rewards">
						<input type="hidden" id="upload_rewards_nonce" name="upload_rewards_nonce" value="936e5b735f" />
					</div>
					<div class="mt10 text-center">
						<button type="button" action="info.upload" zibupload="submit" zibupload-nomust="true" class="but jb-blue padding-lg" name="submit">
							<i class="fa fa-check mr10"></i>
							确认修改
						</button>
					</div>
				</div>
			</form>
		</div>
		<div class="ajax-pag hide">
			<div class="next-page ajax-next">
				<a href="#"></a>
			</div>
		</div>
	<?php
	} else {
	?>
		<span class="post_ajax_trigger hide">
			<a href="<?= joe_build_url('user/reward') ?>" class="ajax_load ajax-next ajax-open"></a>
		</span>
	<?php
	}
	?>
	<div class="post_ajax_loader" style="display: none;">
		<div class="zib-widget">
			<div class="mt10">
				<div class="placeholder k1 mb10"></div>
				<div class="placeholder k1 mb10"></div>
				<div class="placeholder s1"></div>
			</div>
			<p class="placeholder k1 mb30"></p>
			<div class="placeholder t1 mb30"></div>
			<p class="placeholder k1 mb30"></p>
			<p style="height: 120px;" class="placeholder t1"></p>
		</div>
	</div>
</div>