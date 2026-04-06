<div class="author-header mb20 radius8 main-shadow main-bg full-widget-sm">
	<div class="page-cover">
		<?php
		$user_cover = joe_user_cover_url();
		if (joe_url_is_video($user_cover)) {
			?><video class="fit-cover user-cover user-cover-id-<?= $this->user->uid ?>" width="100%" src="<?= $user_cover ?>" autoplay loop muted preload="none"></video><?php
		} else {
			?><img referrerpolicy="no-referrer" rel="noreferrer" class="lazyload fit-cover user-cover user-cover-id-<?= $this->user->uid ?>" src="<?= joe_theme_url('assets/img/thumbnail-lg.svg') ?>" data-src="<?= $user_cover ?: joe_theme_url('assets/img/user_t.jpg') ?>" alt="用户封面"><?php
		}
		?>
		<div class="absolute linear-mask"></div>
		<div class="abs-center right-bottom box-body cover-btns">
			<span class="dropup pull-right">
				<a href="javascript:;" class="item mr3 toggle-radius" data-toggle="dropdown"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-menu_2"></use></svg></a>
				<ul class="dropdown-menu">
					<li><a href="<?= joe_relative_url($this->user->permalink) ?>" class=""><i class="fa fa-map-marker mr6"></i>我的主页</a></li>
					<li><a mobile-bottom="true" data-height="330" data-remote="<?= joe_api_url('user_cover_set_modal') ?>" class="avatar-set-link " href="javascript:;" data-toggle="RefreshModal"><i class="fa fa-camera mr6" aria-hidden="true"></i>修改封面</a></li>
				</ul>
			</span>
		</div>
	</div>
	<div class="header-content">
		<div class="flex header-info relative hh">
			<div class="flex0 header-avatar">
				<div class="hover-show relative">
					<span class="avatar-img"><img alt="<?= $this->user->screenName ?>的头像-<?= $this->options->title ?>" src="<?= joe_avatar_lazyload_url() ?>" data-src="<?= joe_avatar_url_by_mail($this->user->mail) ?>" class="lazyload avatar avatar-id-1"></span>
					<a mobile-bottom="true" data-height="410" data-remote="<?= joe_api_url('user_avatar_set_modal') ?>" class="avatar-set-link absolute hover-show-con flex jc xx" href="javascript:;" data-toggle="RefreshModal"><i class="fa fa-camera mb6" aria-hidden="true"></i>修改头像</a>
				</div>
			</div>
			<div class="flex1">
				<div class="em12 name"><span class="display-name"><?= $this->user->screenName ?></span></div>
				<div class="desc user-identity flex ac hh">
					<span class="but" data-clipboard-tag="用户名" data-clipboard-text="<?= $this->user->name ?>"><i class="fa fa-user-o"></i><?= $this->user->name ?></span><span class="but" data-clipboard-tag="邮箱" data-clipboard-text=" <?= $this->user->mail ?>"><i class="fa fa-envelope-o"></i><?= $this->user->mail ?></span>
				</div>
			</div>
			<div class="header-btns flex0 flex ac">
				<a href="<?= joe_relative_url($this->user->permalink) ?>" class="but c-blue ml10 pw-1em radius"><i class="fa fa-map-marker"></i>我的主页</a>
				<a rel="nofollow" target="_blank" href="<?= joe_relative_url($this->options->adminUrl)  ?>manage-comments.php" class="msg-news-icon ml10"><span class="toggle-radius msg-icon"><i class="fa fa-bell-o" aria-hidden="true"></i></span></a>
			</div>
		</div>
	</div>
</div>