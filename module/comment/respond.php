<div class="flex ac jsb virtual-input " fixed-input="#respond">
	<div class="flex flex1 ac">
		<img alt="<?= $this->user->screenName ?>的头像-<?php $this->options->title(); ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($this->user->mail) ?>" class="lazyload avatar avatar-id-<?= $this->user->uid ?>">
		<div class="text-ellipsis simulation mr10">欢迎您留下宝贵的见解！</div>
	</div>
	<span class="but c-blue">提交</span>
</div>
<div id="respond" class="mobile-fixed">
	<div class="fixed-body"></div>
	<form id="commentform" class="<?= $this->respondId ?>">
		<div class="flex ac">
			<div class="comt-title text-center flex0 mr10">
				<div class="comt-avatar mb10"><img alt="<?= $this->user->screenName ?>的头像-<?php $this->options->title(); ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($this->user->mail) ?>" class="lazyload avatar avatar-id-<?= $this->user->uid ?>"></div>
				<p class="text-ellipsis muted-2-color"><?= $this->user->screenName ?></p>
			</div>
			<div class="comt-box grow1">
				<div class="action-text mb10 em09 muted-2-color"></div>
				<textarea placeholder="欢迎您留下宝贵的见解！" autoheight="true" maxheight="188" class="form-control grin" name="comment" id="comment" cols="100%" rows="4" tabindex="1" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
				<div style="width: 230px;">
					<input machine-verification="slider" type="hidden" name="captcha_mode" value="slider" slider-id="">
				</div>
				<div class="comt-ctrl relative">
					<div class="comt-tips">
						<input type='hidden' name='comment_url' value='<?= $this->commentUrl ?>' />
						<input type='hidden' name='comment_post_ID' value='<?= $this->cid ?>' id='comment_post_ID' />
						<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
					</div>
					<div class="comt-tips-right pull-right">
						<a class="but c-red" id="cancel-comment-reply-link" href="javascript:;">取消</a>
						<button class="but c-blue pw-1em input-expand-submit comment-send" name="submit" id="submit" tabindex="5">提交评论</button>
					</div>
					<div class="comt-tips-left">
						<span class="dropup relative smilie">
							<a class="but btn-input-expand input-smilie mr6" href="javascript:;">
								<i class="fa fa-fw fa-smile-o"></i>
								<span class="hide-sm">表情</span>
							</a>
							<div class="dropdown-menu">
								<div class="dropdown-smilie scroll-y mini-scrollbar">
									<?php $this->need('module/single/comment-smilies.php') ?>
								</div>
							</div>
						</span>
						<span class="dropup relative code">
							<a class="but btn-input-expand input-code mr6" href="javascript:;">
								<i class="fa fa-fw fa-code"></i>
								<span class="hide-sm">代码</span>
							</a>
							<div class="dropdown-menu">
								<div class="dropdown-code">
									<p>请输入代码：</p>
									<p>
										<textarea rows="6" tabindex="1" class="form-control input-textarea" placeholder="在此处粘贴或输入代码"></textarea>
									</p>
									<div class="text-right">
										<a type="submit" class="but c-blue pw-1em" href="javascript:;">确认</a>
									</div>
								</div>
							</div>
						</span>
						<span class="dropup relative image">
							<a class="but btn-input-expand input-image mr6" href="javascript:;">
								<i class="fa fa-fw fa-image"></i>
								<span class="hide-sm">图片</span>
							</a>
							<div class="dropdown-menu">
								<div class="tab-content">
									<div class="tab-pane fade in active dropdown-image" id="image-tab-comment-1">
										<p>请填写图片地址：</p>
										<p>
											<textarea rows="2" tabindex="1" class="form-control input-textarea" style="height:95px;" placeholder="http://..."></textarea>
										</p>
										<div class="text-right">
											<a type="submit" class="but c-blue pw-1em" href="javascript:;">确认</a>
										</div>
									</div>
								</div>
							</div>
						</span>
						<span class="dropup relative quick">
							<a class="but btn-input-expand input-quick mr6" href="javascript:;">
								<svg class="icon" aria-hidden="true">
									<use xlink:href="#icon-quick-reply"></use>
								</svg>
								<span class="hide-sm">快捷回复</span>
							</a>
							<div class="dropdown-menu">
								<div class="relative dropdown-quick-often">
									<ul class="list-inline tab-nav-theme text-center">
										<li class="active">
											<a class="ml3 mr3" data-toggle="tab" href="#input_expand_quick_often_sys_comment">系统</a>
										</li>
										<li class="">
											<a class="ml3 mr3" data-toggle="tab" href="#input_expand_quick_often_user_comment">我的</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class=" in active tab-pane fade quick-often-box scroll-y mini-scrollbar" id="input_expand_quick_often_sys_comment">
											<div class="quick-reply-item">谢谢你的分享，我从中学到了很多！</div>
											<div class="quick-reply-item">教程很好用，谢谢！</div>
											<div class="quick-reply-item">好东西，学习一下！</div>
											<div class="quick-reply-item">楼主听话，快到碗里来！</div>
											<div class="quick-reply-item">路过一下，我只是来打酱油的！</div>
											<div class="quick-reply-item">水帖美如花，养护靠大家！</div>
										</div>
										<div class=" tab-pane fade quick-often-box scroll-y mini-scrollbar" id="input_expand_quick_often_user_comment">
											<div class="quick-reply-myitem-box">
												<div class="text-center muted-2-color" style="margin: 40px 0 30px;">暂无快捷回复</div>
											</div>
											<div class="padding-10">
												<a new="new" data-class="modal-mini" mobile-bottom="true" data-height="330" data-remote="http://blog.yihang.info/wp-admin/admin-ajax.php?action=user_edit_quick_often" class="edit-quick-often-link but block c-blue" href="javascript:;" data-toggle="RefreshModal">
													<svg class="icon" aria-hidden="true">
														<use xlink:href="#icon-add"></use>
													</svg>
													添加快捷回复
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</span>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>