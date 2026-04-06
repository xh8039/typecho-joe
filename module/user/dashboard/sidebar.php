<div class="col-sm-3">
	<div class="sidebar-user"></div>
	<div class="mb10-sm mb20 flex ac jsa zib-widget padding-10 text-center">
		<?php
		$stat = Widget\Stat::alloc();
		$PostsNum = joe_number_word($stat->myPublishedPostsNum);
		$CommentsNum = joe_number_word($stat->myPublishedCommentsNum);
		// $agree = joe_number_word(joe_author_content_field_sum($this->user->uid, 'agree'));
		// $views = joe_number_word(joe_author_content_field_sum($this->user->uid, 'views'));
		?>
		<a class="user-statistics-item" href="<?= joe_url_builder($this->user->permalink, ['tab' => 'post']) ?>">
			<div class="em14"><?= $PostsNum ?></div>
			<div class="em09 opacity5 mt6">文章</div>
		</a>
		<a class="user-statistics-item" href="<?= joe_url_builder($this->user->permalink, ['tab' => 'comment']) ?>">
			<div class="em14"><?= $CommentsNum ?></div>
			<div class="em09 opacity5 mt6">评论</div>
		</a>
		<a class="user-statistics-item" href="<?= joe_url_builder($this->user->permalink, ['tab' => 'favorite']) ?>">
			<div class="em14">0</div>
			<div class="em09 opacity5 mt6">收藏</div>
		</a>
		<a class="user-statistics-item" href="<?= joe_url_builder($this->user->permalink, ['tab' => 'follow']) ?>">
			<div class="em14">0</div>
			<div class="em09 opacity5 mt6">粉丝</div>
		</a>
	</div>
	<div class="zib-widget padding-6 mb10-sm">
		<div class="padding-6 ml3">我的服务</div>
		<div class="flex ac hh text-center icon-but-box user-icon-but-box">
			<item class="icon-but-order" data-onclick="[data-target='#user-tab-order']">
				<div class="em16">
					<svg class="icon" aria-hidden="true">
						<use xlink:href="#icon-order-color"></use>
					</svg>
				</div>
				<div class="px12 muted-color mt3">我的订单</div>
			</item>
		</div>
	</div>
	<div class="zib-widget padding-6">
		<div class="padding-6 ml3">功能设置</div>
		<div class="flex ac hh text-center icon-but-box user-icon-but-box">
			<item class="icon-but-msg" data-onclick="[data-target='#user-tab-msg']">
				<div class="em16">
					<svg class="icon" aria-hidden="true">
						<use xlink:href="#icon-msg-color"></use>
					</svg>
				</div>
				<div class="px12 muted-color mt3">消息通知</div>
			</item>
			<item class="icon-but-data" data-onclick="[data-target='#user-tab-data']">
				<div class="em16">
					<svg class="icon" aria-hidden="true">
						<use xlink:href="#icon-user-color"></use>
					</svg>
				</div>
				<div class="px12 muted-color mt3">个人资料</div>
			</item>
			<item class="icon-but-rewards" data-onclick="[data-target='#user-tab-rewards']">
				<div class="em16">
					<svg class="icon" aria-hidden="true">
						<use xlink:href="#icon-gift-color"></use>
					</svg>
				</div>
				<div class="px12 muted-color mt3">打赏收款</div>
			</item>
			<item class="icon-but-account" data-onclick="[data-target='#user-tab-account']">
				<div class="em16">
					<svg class="icon" aria-hidden="true">
						<use xlink:href="#icon-security-color"></use>
					</svg>
				</div>
				<div class="px12 muted-color mt3">账户安全</div>
			</item>
		</div>
	</div>
	<div class="sidebar-user"></div>
	<div class="hide">
		<ul class="list-inline scroll-x mini-scrollbar tab-nav-theme">
			<?php $index = joe_build_url('user/index') ?>
			<li class="<?= $tab_name === 'index' ? 'active' : '' ?>"><a drawer-title="首页" data-drawer="show" route="<?= joe_build_url('user/index') ?>" route-back="<?= $index ?>" href="javascript:;" data-toggle="tab" data-ajax data-target="#user-tab-index">首页</a></li>
			<li class="<?= $tab_name === 'order' ? 'active' : '' ?>"><a drawer-title="我的订单" data-drawer="show" route="<?= joe_build_url('user/order') ?>" route-back="<?= $index ?>" href="javascript:;" data-toggle="tab" data-ajax data-target="#user-tab-order">我的订单</a></li>
			<li class="<?= $tab_name === 'reward' ? 'active' : '' ?>"><a drawer-title="打赏收款设置" data-drawer="show" route="<?= joe_build_url('user/reward') ?>" route-back="<?= $index ?>" href="javascript:;" data-toggle="tab" data-ajax data-target="#user-tab-rewards">打赏收款</a></li>
			<li class="<?= $tab_name === 'profile' ? 'active' : '' ?>"><a drawer-title="个人资料设置" data-drawer="show" route="<?= joe_build_url('user/profile') ?>" route-back="<?= $index ?>" href="javascript:;" data-toggle="tab" data-ajax data-target="#user-tab-data">个人资料</a></li>
			<li class="<?= $tab_name === 'account' ? 'active' : '' ?>"><a drawer-title="账户绑定及安全" data-drawer="show" route="<?= joe_build_url('user/account') ?>" route-back="<?= $index ?>" href="javascript:;" data-toggle="tab" data-ajax data-target="#user-tab-account">账户绑定及安全</a></li>
			<li class="<?= $tab_name === 'message' ? 'active' : '' ?>"><a drawer-title="消息通知设置" data-drawer="show" route="<?= joe_build_url('user/message') ?>" route-back="<?= $index ?>" href="javascript:;" data-toggle="tab" data-ajax data-target="#user-tab-msg">消息通知</a></li>
		</ul>
	</div>
</div>