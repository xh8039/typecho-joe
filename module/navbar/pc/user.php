<?php
if (!$this->user->hasLogin()) {
?>
	<div class="sub-user-box">
		<div class="text-center">
			<div class="flex jsa header-user-href">
				<a href="javascript:;" class="signin-loader"><div class="badg mb6 toggle-radius c-blue"><svg class="icon" aria-hidden="true" data-viewBox="50 0 924 924" viewBox="50 0 924 924"><use xlink:href="#icon-user"></use></svg></div><div class="c-blue">登录</div></a>
				<a href="javascript:;" class="signup-loader"><div class="badg mb6 toggle-radius c-green"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-signup"></use></svg></div><div class="c-green">注册</div></a>
				<a rel="nofollow" href="<?= joe_user_auth_url('resetpassword') ?>"><div class="badg mb6 toggle-radius c-purple"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-user_rp"></use></svg></div><div class="c-purple">找回密码</div></a>
			</div>
		</div>
	</div>
<?php
	return;
}
?>
<div class="sub-user-box">
	<div class="user-info flex ac relative">
		<a href="<?= joe_root_relative_link($this->options->adminUrl) ?>profile.php"><span class="avatar-img"><img alt="<?= $this->user->screenName ?>的头像-<?= $this->options->title ?>" src="<?= joe_theme_url('assets/img/avatar-default.png', null) ?>" data-src="<?= joe_get_avatar_by_mail($this->user->mail) ?>" class="lazyload avatar avatar-id-<?= $this->user->uid ?>"></span></a>
		<div class="user-right flex flex1 ac jsb ml10">
			<div class="flex1" style="max-width: calc(100% - 40px);"><b><name class="flex ac flex1"><a class="display-name text-ellipsis " href="<?= joe_root_relative_link($this->options->adminUrl) ?>profile.php"><?= $this->user->screenName ?></a></name></b><div class="px12 muted-2-color text-ellipsis"><span class="yiyan" type="cn">这家伙很懒，什么都没有写...</span></div></div>
		</div>
		<a href="<?= joe_root_relative_link($this->options->adminUrl) ?>manage-comments.php" class="msg-news-icon abs-right"><span class="toggle-radius msg-icon"><i class="fa fa-bell-o" aria-hidden="true"></i></span></a>
	</div>
	<div class="em09 author-tag mb10 mt6 flex jc">
		<?php
		Typecho\Widget::widget('Widget_Stat')->to($stat);
		$PostsNum = joe_number_word($stat->myPublishedPostsNum);
		$CommentsNum = joe_number_word($stat->myPublishedCommentsNum);
		$agree = joe_number_word(joe_author_content_field_sum($this->user->uid, 'agree'));
		$views = joe_number_word(joe_author_content_field_sum($this->user->uid, 'views'));
		?>
		<a class="but c-blue tag-posts" data-toggle="tooltip" title="共<?= $PostsNum ?>篇文章" href="<?= joe_root_relative_link($this->user->permalink) ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-post"></use></svg><?= $PostsNum ?></a>
		<a target="_blank" class="but c-green tag-comment" data-toggle="tooltip" title="共<?= $CommentsNum ?>条评论" href="<?= joe_root_relative_link($this->options->adminUrl) ?>manage-comments.php"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?= $CommentsNum ?></a>
		<span class="but c-yellow tag-follow" data-toggle="tooltip" title="共<?= $agree ?>个点赞"><i class="fa fa-heart em09"></i><?= $agree ?></span>
		<span class="badg c-red tag-view" data-toggle="tooltip" title="人气值 <?= $views ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-hot"></use></svg><?= $views ?></span>
	</div>
	<div class="relative opacity5"><i class="line-form-line"></i></div>
	<div class="mt10 text-center">
		<div class="flex jsa header-user-href">
			<a rel="nofollow" target="_blank" href="<?= joe_root_relative_link($this->options->adminUrl) ?>profile.php">
				<div class="badg mb6 toggle-radius c-blue"><svg class="icon" aria-hidden="true" data-viewBox="50 0 924 924" viewBox="50 0 924 924"><use xlink:href="#icon-user"></use></svg></div>
				<div class="c-blue">用户中心</div>
			</a>
			<a rel="nofollow" href="http://blog.yihang.info?user_center=order">
				<div class="badg mb6 toggle-radius c-purple"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-handbag"></use></svg></div>
				<div class="c-purple">我的订单</div>
			</a>
			<a target="_blank" rel="nofollow" class="newadd-btns start-new-posts btn-newadd" href="<?= joe_root_relative_link($this->options->adminUrl) ?>write-post.php">
				<div class="badg mb6 toggle-radius c-green"><i class="fa fa-fw fa-pencil-square-o"></i></div>
				<div class="c-green">发布文章</div>
			</a>
			<a href="javascript:;" data-toggle="modal" data-target="#modal_signout">
				<div class="badg mb6 toggle-radius c-red"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-signout"></use></svg></div>
				<div class="c-red">退出登录</div>
			</a>
		</div>
		<?php
		if ($this->user->group == 'administrator') {
		?>
		<div class="flex jsa header-user-href">
			<a rel="nofollow" target="_blank" href="<?= joe_root_relative_link($this->options->adminUrl) ?>options-theme.php">
				<div class="badg mb6 toggle-radius c-yellow"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-theme"></use></svg></div>
				<div class="c-yellow">主题设置</div>
			</a>
			<a rel="nofollow" target="_blank" href="<?= joe_root_relative_link($this->options->adminUrl) ?>plugins.php">
				<div class="badg mb6 toggle-radius c-yellow"><i class="fa fa-pie-chart"></i></div>
				<div class="c-yellow">插件管理</div>
			</a>
			<a rel="nofollow" target="_blank" href="<?= $this->options->adminUrl . 'extending.php?panel=' . urlencode('../themes/' .THEME_NAME. '/admin/orders.php') ?>">
				<div class="badg mb6 toggle-radius c-yellow"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-handbag"></use></svg></div>
				<div class="c-yellow">商城中心</div>
			</a>
			<a rel="nofollow" target="_blank" href="<?= joe_root_relative_link($this->options->adminUrl) ?>">
				<div class="badg mb6 toggle-radius c-yellow"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-set"></use></svg></div>
				<div class="c-yellow">后台管理</div>
			</a>
		</div>
		<?php
		}
		?>
	</div>
</div>