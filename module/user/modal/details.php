<div class="mb10 border-bottom touch" style="padding-bottom: 12px;">
	<button class="close ml10" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
	<div class="" style="">
		<div class="user-info flex ac"><a href="<?= joe_relative_url($user->permalink) ?>"><span class="avatar-img"><img alt="<?= $user->screenName ?>的头像-<?= $options->title ?>" src="<?= joe_avatar_lazyload_url() ?>" data-src="<?= joe_avatar_url_by_mail($user->mail) ?>" class="lazyload avatar avatar-id-1"></span></a>
			<div class="user-right flex flex1 ac jsb ml10">
				<div class="flex1">
					<name class="flex ac flex1"><a class="display-name text-ellipsis " href="<?= joe_relative_url($user->permalink) ?>"><?= $user->screenName ?></a></name>
					<div class="px12-sm muted-2-color text-ellipsis"><span class="yiyan" type="cn"></span></div>
				</div>
				<div class="flex0 user-action"></div>
			</div>
		</div>
	</div>
</div>
<div class="mini-scrollbar scroll-y max-vh5 flex hh">
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">签名</div>
		<div class="author-set-right mt6">这家伙很懒，什么都没有写</div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">注册时间</div>
		<div class="author-set-right mt6"><?= joe_date($user->created) ?></div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">最后登录</div>
		<div class="author-set-right mt6"><?= joe_date($user->logged) ?></div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">邮箱</div>
		<div class="author-set-right mt6"><?= $user->mail ?></div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">性别</div>
		<div class="author-set-right mt6">未公开</div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">地址</div>
		<div class="author-set-right mt6">未公开</div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">个人网站</div>
		<?php $link = joe_externa_to_internal_link($user->url) ?>
		<div class="author-set-right mt6"><a rel="<?= $link['rel'] ?>" class="focus-color" href="<?= $link['url'] ?>" target="_blank"><?= $user->url ?></a></div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">QQ</div>
		<div class="author-set-right mt6">未公开</div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">微信</div>
		<div class="author-set-right mt6">未公开</div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">微博</div>
		<div class="author-set-right mt6">未公开</div>
	</div>
	<div class="mb10 flex" style="min-width: 50%;">
		<div class="author-set-left muted-2-color" style="min-width: 80px;">Github</div>
		<div class="author-set-right mt6">未公开</div>
	</div>
</div>