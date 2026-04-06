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

?><div class="mb20">
	<div class="user-card zib-widget widget">
		<?php
		$user_cover = joe_user_cover_url();
		if (joe_url_is_video($user_cover)) {
			?>
			<div class="user-cover graphic" style="padding-bottom: 0;"><video width="100%" src="<?= $user_cover ?>" autoplay loop muted preload="none"></video></div>
			<?php
		} else {
			?>
			<div class="user-cover graphic" style="padding-bottom: 50%;"><img referrerpolicy="no-referrer" rel="noreferrer" class="lazyload fit-cover user-cover user-cover-id-1" src="<?= joe_theme_url('assets/img/thumbnail-lg.svg', null) ?>" data-src="<?= $user_cover ?: joe_theme_url('assets/img/user_t.jpg') ?>" alt="用户封面"></div>
			<?php
		}
		if ($this->user->hasLogin()) {
			?>
			<div class="card-content mt10 relative">
				<div class="user-content">
					<div class="user-avatar"><a href="<?= joe_relative_url($this->user->permalink) ?>"><span class="avatar-img avatar-lg"><img alt="<?= $this->user->screenName ?>的头像-<?= $this->options->title ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_avatar_url_by_mail($this->user->mail) ?>" class="lazyload avatar avatar-id-1"></span></a></div>
					<div class="user-info mt20 mb10">
						<div class="user-name flex jc"><name class="flex1 flex ac"><a class="display-name text-ellipsis " href="<?= joe_relative_url($this->user->permalink) ?>"><?= $this->user->screenName ?></a></name></div>
						<div class="author-tag mt10 mini-scrollbar">
						<?php
						$stat = Widget\Stat::alloc();
						$PostsNum = joe_number_word($stat->myPublishedPostsNum);
						$CommentsNum = joe_number_word(joe_user_comment_count($this->user->uid));
						$agree = joe_number_word(joe_author_content_field_sum($this->user->uid, 'agree'));
						$views = joe_number_word(joe_author_content_field_sum($this->user->uid, 'views'));
						?>
						<a class="but c-blue tag-posts" data-toggle="tooltip" title="共<?= $PostsNum ?>篇文章" href="<?= joe_relative_url($this->user->permalink) ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-post"></use></svg><?= $PostsNum ?></a>
						<a class="but c-green tag-comment" data-toggle="tooltip" title="共<?= $CommentsNum ?>条评论" href="<?= joe_relative_url($this->user->permalink) ?>?tab=comment"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?= $CommentsNum ?></a>
						<span class="badg c-yellow tag-like" data-toggle="tooltip" title="获得<?= $agree ?>个点赞"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= $agree ?></span>
						<span class="badg c-red tag-view" data-toggle="tooltip" title="人气值 <?= $views ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-hot"></use></svg><?= $views ?></span>
						</div>
						<div class="user-desc mt10 muted-2-color em09"><span class="yiyan" type="cn">这家伙很懒，什么都没有写...</span></div>
						<div class="user-btns mt20"><a target="_blank" rel="nofollow" class="newadd-btns but pw-1em mr6 jb-pink btn-newadd" href="<?= $this->options->adminUrl?>write-post.php">发布文章</a><a rel="nofollow" href="<?= joe_build_url('user/index') ?>" class="but pw-1em ml6 jb-blue">用户中心</a></div>
					</div>
				</div>
			</div>
			<?php
		} else {
			?>
			<div class="card-content mt10">
				<div class="user-content">
					<div class="user-avatar"><span class="avatar-img avatar-lg"><img alt="默认头像" class="fit-cover avatar" src="<?= joe_theme_url('assets/img/avatar-default.png') ?>"></span></div>
					<div class="user-info mt10">
						<div class="text-center ">
							<p class="muted-color box-body em12">HI！请登录</p>
							<p><a href="javascript:;" class="signin-loader but jb-blue padding-lg"><i class="fa fa-fw fa-sign-in" aria-hidden="true"></i>登录</a><a href="javascript:;" class="signup-loader ml10 but jb-yellow padding-lg"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-signup"></use></svg>注册</a></p>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>