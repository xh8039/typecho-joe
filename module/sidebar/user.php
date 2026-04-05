<?php

?>
<div class="mb20">
	<div class="user-card zib-widget widget">
		<?php
		$aside_background = joe_optionMulti($this->options->joe_user_background, '/\R/', null);
		$aside_background = empty($aside_background) ? '' : $aside_background[array_rand($aside_background)];
		$aside_background_video = false;
		if (str_starts_with($aside_background, 'video:')) {
			$aside_background = str_starts_replace('video:', '', $aside_background);
			$aside_background_video = true;
		} else if (pathinfo($aside_background, PATHINFO_EXTENSION) == 'mp4') $aside_background_video = true;
		if ($aside_background_video) {
		?>
			<div class="user-cover graphic" style="padding-bottom: 0;"><video width="100%" src="<?= $aside_background ?>" autoplay loop muted preload="none"></video></div>
		<?php
		} else {
		?>
			<div class="user-cover graphic" style="padding-bottom: 50%;"><img referrerpolicy="no-referrer" rel="noreferrer" class="lazyload fit-cover user-cover user-cover-id-1" src="<?= joe_theme_url('assets/img/thumbnail-lg.svg', null) ?>" data-src="<?= empty($aside_background) ? joe_theme_url('assets/img/user_t.jpg', null) : $aside_background ?>" alt="用户封面"></div>
		<?php
		}
		if ($this->user->hasLogin()) {
			?>
			<div class="card-content mt10 relative">
				<div class="user-content">
					<div class="user-avatar"><a target="_blank" href="<?= joe_root_relative_link($this->options->adminUrl) ?>profile.php"><span class="avatar-img avatar-lg"><img alt="<?= $this->user->screenName ?>的头像-<?= $this->options->title ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($this->user->mail) ?>" class="lazyload avatar avatar-id-1"></span></a></div>
					<div class="user-info mt20 mb10">
						<div class="user-name flex jc"><name class="flex1 flex ac"><a target="_blank" class="display-name text-ellipsis " href="<?= joe_root_relative_link($this->options->adminUrl) ?>profile.php"><?= $this->user->screenName ?></a></name></div>
						<div class="author-tag mt10 mini-scrollbar">
						<?php
						Typecho\Widget::widget('Widget_Stat')->to($stat);
						$PostsNum = joe_number_word($stat->myPublishedPostsNum);
						$CommentsNum = joe_number_word($stat->myPublishedCommentsNum);
						$agree = joe_number_word(joe_author_content_field_sum($this->user->uid, 'agree'));
						$views = joe_number_word(joe_author_content_field_sum($this->user->uid, 'views'));
						?>
						<a class="but c-blue tag-posts" data-toggle="tooltip" title="共<?= $PostsNum ?>篇文章" href="<?= joe_root_relative_link($this->user->permalink) ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-post"></use></svg><?= $PostsNum ?></a>
						<a target="_blank" class="but c-green tag-comment" data-toggle="tooltip" title="共<?= $CommentsNum ?>条评论" href="<?= joe_root_relative_link($this->options->adminUrl) ?>manage-comments.php"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?= $CommentsNum ?></a>
						<span class="badg c-yellow tag-like" data-toggle="tooltip" title="获得<?= $agree ?>个点赞"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= $agree ?></span>
						<span class="badg c-red tag-view" data-toggle="tooltip" title="人气值 <?= $views ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-hot"></use></svg><?= $views ?></span>
						</div>
						<div class="user-desc mt10 muted-2-color em09"><span class="yiyan" type="cn">这家伙很懒，什么都没有写...</span></div>
						<div class="user-btns mt20"><a rel="nofollow" class="newadd-btns but pw-1em mr6 jb-pink btn-newadd" href="<?= $this->options->adminUrl?>write-post.php">发布文章</a><a target="_blank" rel="nofollow" href="<?= $this->options->adminUrl?>profile.php" class="but pw-1em ml6 jb-blue">用户中心</a></div>
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