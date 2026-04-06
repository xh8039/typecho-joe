<div class="ajaxpager tab-pane fade userdata-set <?= $tab_name == 'profile' ? 'in active' : '' ?>" id="user-tab-data">
	<?php
	if ($tab_name == 'profile') {
	?>
		<div class="ajax-item">
			<form class="zib-widget">
				<div class="mb30">
					<div class="author-set-left">
						<span class="avatar-img avatar-lg">
							<img alt="<?= $this->user->screenName ?>的头像-<?= $this->options->title ?>" src="<?= joe_avatar_lazyload_url() ?>" data-src="<?= joe_user_avatar_url() ?>" class="lazyload avatar avatar-id-<?= $this->user->uid ?>">
						</span>
					</div>
					<div class="author-set-right mt10">
						<div class="flex ac">
							<b class="em12"><?= $this->user->screenName ?></b>
							<a mobile-bottom="true" data-height="410" data-remote="<?= joe_api_url('user_avatar_set_modal') ?>" class="avatar-set-link but c-blue p2-10 em09 ml6 hollow shrink0" href="javascript:;" data-toggle="RefreshModal">修改头像</a>
						</div>
						<div class="muted-2-color mt6">注册时间：<?= joe_date($this->user->created) ?></div>
						<div class="muted-2-color mt6">最后登录：<?= joe_date($this->user->logged) ?></div>
					</div>
				</div>
				<div class="mb30">
					<div class="author-set-left">昵称</div>
					<div class="author-set-right">
						<input type="input" class="form-control" name="name" value="<?= $this->user->screenName ?>" placeholder="请输入昵称">
					</div>
				</div>
				<!-- <div class="mb30"><div class="author-set-left">个人签名</div><div class="author-set-right"><input type="input" class="form-control" name="desc" value="" placeholder="请简短的介绍自己"></div></div> -->
				<!-- <div class="mb30">
					<div class="author-set-left">隐私设置</div>
					<div class="author-set-right form-select">
						<select class="form-control" name="privacy">
							<option value="not_show">社交资料 所有人都不可见</option>
							<option value="public">社交资料 所有人可见</option>
							<option value="just_logged">社交资料 仅注册用户可见</option>
						</select>
					</div>
				</div> -->
				<!-- <div class="mb30">
					<div class="author-set-left">性别</div>
					<div class="author-set-right form-select">
						<select class="form-control" name="gender">
							<option value="保密">保密</option>
							<option value="男">男</option>
							<option value="女">女</option>
						</select>
					</div>
				</div> -->
				<!-- <div class="mb30">
					<div class="author-set-left">居住地</div>
					<div class="author-set-right">
						<input type="input" class="form-control" name="address" value="" placeholder="请输入居住地址">
					</div>
				</div> -->
				<div class="mb30">
					<div class="author-set-left">个人网站</div>
					<div class="author-set-right">
						<!-- <input type="input" class="form-control" name="url_name" value="" placeholder="请输入网站名称"> -->
						<input type="input" class="form-control" name="url" value="<?= $this->user->url ?>" placeholder="请输入网址">
					</div>
				</div>
				<!-- <div class="mb30">
					<div class="author-set-left">QQ</div>
					<div class="author-set-right">
						<input type="input" class="form-control" name="qq" value="" placeholder="请输入QQ">
					</div>
				</div> -->
				<!-- <div class="mb30">
					<div class="author-set-left">微信</div>
					<div class="author-set-right">
						<input type="input" class="form-control" name="weixin" value="" placeholder="请输入微信">
					</div>
				</div> -->
				<!-- <div class="mb30">
					<div class="author-set-left">微博</div>
					<div class="author-set-right">
						<input type="input" class="form-control" name="weibo" value="" placeholder="请输入微博地址">
					</div>
				</div> -->
				<!-- <div class="mb30">
					<div class="author-set-left">Github</div>
					<div class="author-set-right">
						<input type="input" class="form-control" name="github" value="" placeholder="请输入Github地址">
					</div>
				</div> -->
				<div class="mb10">
					<div class="author-set-left"></div>
					<div class="author-set-right">
						<input type="hidden" name="user_id" value="<?= $this->user->uid ?>">
						<input type="hidden" name="action" value="user_edit_datas">
						<button type="button" zibajax="submit" class="but jb-blue padding-lg" name="submit"><i class="fa fa-check mr10"></i>确认提交</button>
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
			<a href="<?= joe_build_url('user/profile') ?>" class="ajax_load ajax-next ajax-open"></a>
		</span>
	<?php
	}
	?>
	<div class="post_ajax_loader" style="display: none;">
		<div class="zib-widget">
			<div class="mb30">
				<div class="author-set-left">
					<span class="avatar-img avatar-lg">
						<div class="placeholder avatar"></div>
					</span>
				</div>
				<div class="author-set-right mt6">
					<div class="placeholder k1 mb10"></div>
					<div class="placeholder k1 mb10"></div>
					<div class="placeholder s1"></div>
				</div>
			</div>
			<p class="placeholder k1 mb30"></p>
			<div class="placeholder t1 mb30"></div>
			<p class="placeholder k1 mb30"></p>
			<p style="height: 120px;" class="placeholder t1"></p>
		</div>
	</div>
</div>