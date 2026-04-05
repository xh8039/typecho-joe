<?php
$path_info = $this->request->getPathInfo();
$path_info_explode = explode('/', $path_info);
$uid = $path_info_explode[2];
$author = Widget\Users\Author::allocWithAlias('user:' . $uid, ['uid' => $uid]);
if (!$author->have()) {throw new WidgetException(_t('作者不存在'), 404);}
?>
<div class="author-header mb20 radius8 main-shadow main-bg full-widget-sm">
	<div class="page-cover">
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
				<div class="user-cover fit-cover" style="padding-bottom: 0;"><video width="100%" src="<?= $aside_background ?>" autoplay loop muted preload="none"></video></div>
			<?php
			} else {
			?>
				<img referrerpolicy="no-referrer" rel="noreferrer" class="lazyload fit-cover user-cover user-cover-id-1" src="<?= joe_theme_url('assets/img/thumbnail-lg.svg',null) ?>" data-src="<?= empty($aside_background) ? joe_theme_url('assets/img/user_t.jpg', null) : $aside_background ?>" alt="用户封面">
			<?php
			}
		?>
		<div class="absolute linear-mask"></div>
		<div class="flex ac single-metabox cover-meta abs-right">
			<div class="post-metas">
				<?php
				$views = joe_number_word(joe_author_content_field_sum($author->uid, 'views'));
				$agree = joe_number_word(joe_author_content_field_sum($author->uid, 'agree'));
				?>
				<item><a data-toggle="tooltip" data-original-title="人气值 <?= $views ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-hot"></use></svg><?= $views ?></a></item>
				<item><a data-toggle="tooltip" data-original-title="获得<?= $agree ?>个点赞"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= $agree ?></a>
				</item>
			</div>
		</div>
		<div class="abs-center right-bottom padding-6 cover-btns">
			<span class="dropup pull-right">
				<a href="javascript:;" class="item mr3 toggle-radius" data-toggle="dropdown"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-menu_2"></use></svg></a>
				<ul class="dropdown-menu">
					<li><a data-class="modal-mini" mobile-bottom="true" data-height="330" data-remote="/admin-ajax.php?action=user_details_data_modal&id=1" class="user-details-link " href="javascript:;" data-toggle="RefreshModal"><svg class="mr6" aria-hidden="true"><use xlink:href="#icon-user"></use></svg>更多资料</a></li>
					<li><a search-user="1" search-trem="null" search-placeholder="在用户[<?= $author->screenName ?>]中搜索内容" class="main-search-btn" href="javascript:;"><svg class="mr6" aria-hidden="true"><use xlink:href="#icon-search"></use></svg>搜索内容</a>
					</li>
				</ul>
			</span>
		</div>
	</div>
	<div class="header-content">
		<div class="flex header-info relative hh">
			<div class="flex0 header-avatar"><span class="avatar-img"><img alt="<?= $author->screenName ?>的头像-子比主题" src="<?= joe_avatar_lazyload_url() ?>" data-src="<?= joe_get_avatar_by_mail($author->mail) ?>" class="alone-imgbox-img lazyload avatar avatar-id-1"></span></div>
			<div class="flex1">
				<div class="em12 name"><name class="flex ac flex1"><a class="display-name text-ellipsis " href="<?= $author->permalink ?>"><?= $author->screenName ?></a></name></div>
				<?php
				$group = ['subscriber'=>'关注者','contributor'=>'贡献者','editor'=>'编辑','administrator'=>'管理员'];
				$group_color = ['subscriber'=>'gray','contributor'=>'blue','editor'=>'yellow','administrator'=>'red'];
				?>
				<div class="user-identity flex ac hh"><span class="badg c-<?= $group_color[$author->group] ?>"><?= $group[$author->group] ?></span></div>
				<div class="mt6 desc muted-2-color"><span class="yiyan" type="cn">这家伙很懒，什么都没有写...</span></div>
			</div>
			<div class="header-btns flex0 flex ac">
				<?php
				if ($this->user->hasLogin() && $this->user->uid === $author->uid) {
					?>
					<a target="_blank" rel="nofollow" href="<?= joe_root_relative_link($this->options->adminUrl) ?>profile.php" class="but c-blue ml10 pw-1em radius"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-user"></use></svg>用户中心</a>
					<a rel="nofollow" href="/message" class="msg-news-icon ml10"><span class="toggle-radius msg-icon"><i class="fa fa-bell-o" aria-hidden="true"></i></span></a>
					<?php
				} else {
					?>
					<a href="javascript:;" data-action="follow_user" class="but jb-pink ml10 pw-1em" data-pid="2"><count><i class="fa fa-heart-o mr3" aria-hidden="true"></i>关注</count></a>
					<a data-class="full-sm" mobile-bottom="true" data-height="550" data-remote="/admin-ajax.php?action=private_window_modal&receive_user=2" class="but jb-blue ml10 pw-1em" href="javascript:;" data-toggle="RefreshModal"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-private"></use></svg>私信</a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>