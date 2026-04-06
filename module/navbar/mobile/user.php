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
<div class="sub-user-box">
	<div class="user-info flex ac relative">
		<a href="<?= joe_relative_url($this->user->permalink) ?>"><span class="avatar-img"><img alt="<?= $this->user->screenName ?>的头像-<?= $this->options->title ?>" src="<?= joe_avatar_lazyload_url() ?>" data-src="<?= joe_avatar_url_by_mail($this->user->mail) ?>" class="lazyload avatar avatar-id-<?= $this->user->uid ?>"></span></a>
		<div class="user-right flex flex1 ac jsb ml10"><div class="flex1" style="max-width: calc(100% - 40px);"><b><name class="flex ac flex1"><a class="display-name text-ellipsis " href="<?= joe_relative_url($this->user->permalink) ?>"><?= $this->user->screenName ?></a></name></b><div class="px12 muted-2-color text-ellipsis"><span class="yiyan" type="cn">这家伙很懒，什么都没有写...</span></div></div></div>
		<a target="_blank" href="<?= joe_relative_url($this->options->adminUrl) ?>manage-comments.php" class="msg-news-icon abs-right"><span class="toggle-radius msg-icon"><i class="fa fa-bell-o" aria-hidden="true"></i></span></a>
	</div>
	<div class="em09 author-tag mb10 mt6 flex jc">
		<?php
		$stat = Widget\Stat::alloc();
		$PostsNum = joe_number_word($stat->myPublishedPostsNum);
		$CommentsNum = joe_number_word(joe_user_comment_count($this->user->uid));
		$agree = joe_number_word(joe_author_content_field_sum($this->user->uid, 'agree'));
		$views = joe_number_word(joe_author_content_field_sum($this->user->uid, 'views'));
		?>
		<a class="but c-blue tag-posts" data-toggle="tooltip" title="共<?= $PostsNum ?>篇文章" href="<?= joe_relative_url($this->user->permalink) ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-post"></use></svg><?= $PostsNum ?></a>
		<a class="but c-green tag-comment" data-toggle="tooltip" title="共<?= $CommentsNum ?>条评论" href="<?= joe_relative_url($this->user->permalink) ?>?tab=comment"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?= $CommentsNum ?></a>
		<span class="badg c-red tag-view" data-toggle="tooltip" title="共<?= $agree ?>个点赞"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-hot"></use></svg><?= $agree ?></span>
		<span class="badg c-red tag-view" data-toggle="tooltip" title="人气值 <?= $views ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-hot"></use></svg><?= $views ?></span>
	</div>
	<div class="relative opacity5"><i class="line-form-line"></i></div>
	<div class="mt10 text-center">
		<div class="flex jsa header-user-href">
			<a rel="nofollow" href="<?= joe_build_url('user/index') ?>">
				<div class="badg mb6 toggle-radius c-blue"><svg class="icon" aria-hidden="true" data-viewBox="50 0 924 924" viewBox="50 0 924 924"><use xlink:href="#icon-user"></use></svg></div>
				<div class="c-blue">用户中心</div>
			</a>
			<a rel="nofollow" href="<?= joe_build_url('user/order') ?>">
				<div class="badg mb6 toggle-radius c-purple"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-handbag"></use></svg></div>
				<div class="c-purple">我的订单</div>
			</a>
			<a target="_blank" rel="nofollow" class="newadd-btns start-new-posts btn-newadd" href="<?= joe_relative_url($this->options->adminUrl) ?>write-post.php">
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
				<a rel="nofollow" target="_blank" href="<?= joe_relative_url($this->options->adminUrl) ?>options-theme.php">
					<div class="badg mb6 toggle-radius c-yellow"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-theme"></use></svg></div>
					<div class="c-yellow">主题设置</div>
				</a>
				<a rel="nofollow" target="_blank" href="<?= joe_relative_url($this->options->adminUrl) ?>plugins.php"><div class="badg mb6 toggle-radius c-yellow"><i class="fa fa-pie-chart"></i></div>
					<div class="c-yellow">插件管理</div>
				</a>
				<a rel="nofollow" target="_blank" href="<?= $this->options->adminUrl . 'extending.php?panel=' . urlencode('../themes/' .JOE_THEME_NAME. '/admin/orders.php') ?>">
					<div class="badg mb6 toggle-radius c-yellow"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-handbag"></use></svg></div>
					<div class="c-yellow">商城中心</div>
				</a>
				<a rel="nofollow" target="_blank" href="<?= joe_relative_url($this->options->adminUrl) ?>">
					<div class="badg mb6 toggle-radius c-yellow"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-set"></use></svg></div>
					<div class="c-yellow">后台管理</div>
				</a>
			</div>
		<?php
		}
		?>
	</div>
</div>