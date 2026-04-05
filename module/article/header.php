<div class="article-header theme-box clearfix relative">
	<h1 class="article-title">
		<a href="<?= joe_root_relative_link($this->permalink); ?>"><?php $this->title() ?></a>
	</h1>
	<div class="article-avatar">
		<div class="user-info flex ac article-avatar">
			<a href="<?= $this->author->permalink ?>"><span class="avatar-img"><img alt="<?= $this->author->screenName ?>的头像-<?php $this->options->title(); ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($this->author->mail) ?>" class="lazyload avatar avatar-id-<?= $this->author->uid ?>"></span></a>
			<div class="user-right flex flex1 ac jsb ml10">
				<div class="flex1">
					<name class="flex ac flex1"><a class="display-name text-ellipsis " href="<?= $this->author->permalink ?>"><?= $this->author->screenName ?></a></name>
					<div class="px12-sm muted-2-color text-ellipsis"><span data-toggle="tooltip" data-placement="bottom" title="<?= $this->date('Y年m月d日 H:i') ?>发布"><?= joe_dateWord($this->dateWord) ?>发布</span></div>
				</div>
				<div class="flex0 user-action">
					<a href="javascript:;" class="px12-sm ml10 follow but c-red signin-loader" data-pid="1"><count><i class="fa fa-heart-o mr3" aria-hidden="true"></i>关注</count></a><a data-toggle="modal" data-target="#rewards-modal-1" data-remote="<?= joe_api_url('user_rewards_modal?id=1') ?>" class="ml6 but c-blue px12-sm" href="javascript:;"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-money"></use></svg>赞赏</a>
				</div>
			</div>
		</div>
		<div class="relative">
			<i class="line-form-line"></i>
			<div class="flex ac single-metabox abs-right">
				<div class="post-metas">
					<item class="meta-comm"><a rel="nofollow" data-toggle="tooltip" title="去评论" href="javascript:(scrollTopTo('#comments'));"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?php $this->commentsNum('%d') ?></a></item>
					<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg><?= number_format($this->views); ?></item>
					<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= number_format($this->agree) ?></item>
				</div>
				<?php
				if ($this->user->group === 'administrator') {
					?>
				<div class="clearfix ml6">
					<div class="dropdown more-dropup pull-right">
						<a href="javascript:;" class="but cir post-drop-meta" data-toggle="dropdown"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-menu_2"></use></svg></a>
						<ul class="dropdown-menu">
							<li><a rel="nofollow" target="_blank" href="<?= joe_root_relative_link($this->options->adminUrl) ?>write-post.php?cid=<?= $this->cid; ?>" class=""><i class="fa fa-fw fa-edit mr6"></i>编辑文章</a></li>
							<li><a data-class="modal-mini" mobile-bottom="true" data-height="240" data-remote="<?= joe_api_url('post_delete_modal',['id'=>$this->cid]) ?>" class="c-red" href="javascript:;" data-toggle="RefreshModal"><i class="fa fa-trash-o mr6 fa-fw"></i>删除文章</a></li>
						</ul>
					</div>
				</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>