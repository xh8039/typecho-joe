<button class="close ml3" data-dismiss="modal"><svg class="ic-close" aria-hidden="true" data-viewBox="0 0 1024 1024" viewBox="0 0 1024 1024"><use xlink:href="#icon-close"></use></svg></button>
<div class="private-window">
	<div class="private-window-header mb10 relative">
		<div class="abs-left visible-xs-block"><a href="javascript:;" class="muted-color" data-toggle-class="toggle" data-target=".msg-private"><i class="fa fa-angle-left"></i> 返回列表</a></div>
		<div class="dropdown pull-right">
			<a href="javascript:;" class="muted-color padding-6" data-toggle="dropdown"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-menu_2"></use></svg></a>
			<ul class="dropdown-menu">
				<li><a class="ajax-blacklist" href="javascript:;" ajax-href="<?= joe_api_url('private_blacklist',['user_id'=>$send_user->uid,'receive_user'=>$receive_user->uid]) ?>"><text>加入黑名单</text></a></li>
				<li><a href="<?= joe_relative_url($receive_user->permalink) ?>">查看此用户</a></li>
			</ul>
		</div>
		<div class="text-center ml20"><span class="avatar-img mr6"><img alt="<?= $receive_user->screenName ?>的头像-<?= Helper::options()->title ?>" src="<?= joe_avatar_lazyload_url() ?>" data-src="<?= joe_avatar_url_by_mail($receive_user->mail) ?>" class="lazyload avatar avatar-id-1"></span><?= $receive_user->screenName ?></div>
	</div>
	<div class="private-window-content mb10 scroll-y mini-scrollbar imgbox-container"></div>
	<div class="private-window-footer">
		<form class="from-private">
			<div class="mb6"><textarea placeholder="" class="form-control grin" name="receive" id="receive" rows="2" tabindex="1"></textarea></div>
			<span class="dropup relative smilie">
				<a class="but btn-input-expand input-smilie mr6" href="javascript:;"><i class="fa fa-fw fa-smile-o"></i><span class="hide-sm">表情</span></a>
				<div class="dropdown-menu"><div class="dropdown-smilie scroll-y mini-scrollbar"><?php require JOE_ROOT . 'module/single/comment-smilies.php' ?></div></div>
			</span>
			<span class="dropup relative code"><a class="but btn-input-expand input-code mr6" href="javascript:;"><i class="fa fa-fw fa-code"></i><span class="hide-sm">代码</span></a>
				<div class="dropdown-menu">
					<div class="dropdown-code">
						<p>请输入代码：</p>
						<p><textarea rows="6" tabindex="1" class="form-control input-textarea" placeholder="在此处粘贴或输入代码"></textarea></p>
						<div class="text-right"><a type="submit" class="but c-blue pw-1em" href="javascript:;">确认</a></div>
					</div>
				</div>
			</span>
			<span class="dropup relative image"><a class="but btn-input-expand input-image mr6" href="javascript:;"><i class="fa fa-fw fa-image"></i><span class="hide-sm">图片</span></a>
				<div class="dropdown-menu">
					<div class="tab-content">
						<div class="tab-pane fade in active dropdown-image" id="image-tab-private-1">
							<p>请填写图片地址：</p>
							<p><textarea rows="2" tabindex="1" class="form-control input-textarea" style="height:95px;" placeholder="http://..."></textarea></p>
							<div class="text-right"><a type="submit" class="but c-blue pw-1em" href="javascript:;">确认</a></div>
						</div>
					</div>
				</div>
			</span>
			<span class="dropup relative quick">
				<a class="but btn-input-expand input-quick mr6" href="javascript:;"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-quick-reply"></use></svg><span class="hide-sm">快捷回复</span></a>
				<div class="dropdown-menu">
					<div class="relative dropdown-quick-often">
						<ul class="list-inline tab-nav-theme text-center">
							<li class=""><a class="ml3 mr3" data-toggle="tab" href="#input_expand_quick_often_sys_private">系统</a></li>
							<li class="active"><a class="ml3 mr3" data-toggle="tab" href="#input_expand_quick_often_user_private">我的</a></li>
						</ul>
						<div class="tab-content">
							<div class=" tab-pane fade quick-often-box scroll-y mini-scrollbar" id="input_expand_quick_often_sys_private"><div class="text-center muted-2-color" style="margin: 60px 0;">系统暂无快捷回复</div></div>
							<div class=" in active tab-pane fade quick-often-box scroll-y mini-scrollbar" id="input_expand_quick_often_user_private">
								<div class="quick-reply-myitem-box"><div class="text-center muted-2-color" style="margin: 40px 0 30px;">暂无快捷回复</div></div>
								<div class="padding-10"><a new="new" data-class="modal-mini" mobile-bottom="true" data-height="330" data-remote="<?= joe_api_url('user_edit_quick_often') ?>" class="edit-quick-often-link but block c-blue" href="javascript:;" data-toggle="RefreshModal"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-add"></use></svg>添加快捷回复</a></div>
							</div>
						</div>
					</div>
				</div>
			</span>
			<div class="pull-right"><button class="but c-blue send-private pw-1em input-expand-submit" name="submit" id="submit" tabindex="2"><i class="fa fa-send-o"></i>发送</button></div>
			<input type="hidden" name="send_user" value="<?= $send_user->uid ?>">
			<input type="hidden" name="receive_user" value="<?= $receive_user->uid ?>">
			<input type="hidden" name="action" value="send_private">
			<input type="hidden" id="send_private_nonce" name="send_private_nonce" value="f48e650c5a" />
		</form>
	</div>
</div>