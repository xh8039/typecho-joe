<div class="zib-widget ajax-item mb10 order-item user-order-item order-type-<?= $order['status'] ? '2' : '1' ?>">
	<div class="flex ac jsb mb10">
		<a class="order-item-author" target="_blank" href="<?= joe_relative_url(joe_user_alloc()->permalink) ?>">
			<div class="flex ac"><span class="avatar-mini mr10"><img alt="<?= joe_user_alloc()->screenName ?>的头像-<?= Helper::options()->title ?>" src="<?= joe_avatar_lazyload_url() ?>" data-src="<?= joe_user_avatar_url() ?>" class="lazyload avatar avatar-id-<?= joe_user_alloc()->uid ?>"></span><?= joe_user_alloc()->screenName ?><i class="ml6 fa fa-angle-right em12"></i></div>
		</a>
		<div class="flex0"><?= $order['status'] ? '<span class="c-green">已支付</span>' : (($order['created'] + $order['timeout']) < time() ? '<span class="c-red">交易已关闭</span>' : '<span class="c-red">待支付 <span class="c-yellow px12 badg badg-sm" int-second="1" data-over-text="交易已关闭" data-countdown="' . joe_date($order['created'] + $order['timeout']) . '"></span></span>') ?></div>
	</div>
	<div class="order-content flex show-order-modal pointer" data-order-id="<?= $order['id'] ?>">
		<?php
		$cid = $order['content_cid'];
		$content = Widget\Contents\Post::allocWithAlias('post:' .$cid, ['cid' => $cid]);
		$content->next();
		$thumb = joe_article_thumbnails_url($content)[0];
		?>
		<div class="order-thumb mr10"><img class="radius8 fit-cover" src="<?= $thumb ?>" alt="<?= $content->title ?>-<?= Helper::options()->title ?>"></div>
		<div class="flex1 flex jsb xx">
			<div class="flex1 flex jsb">
				<div class="flex1 mr10">
					<div class="order-title">
						<div class="text-ellipsis mb6 font-bold"><?= $content->title ?></div>
					</div>
					<span class="pay-tag badg badg-sm mr6">付费阅读</span>
					<div class="muted-color em09 mt6"><?= $order['create_time'] ?? date('Y-m-d H:i:s', $order['created']) ?></div>
				</div>
				<div class="flex xx ab">
					<div class="unit-price"><span class="pay-mark px12">￥</span><b><?= $order['pay_price'] ?? $order['money'] ?></b></div>
				</div>
			</div>
		</div>
	</div>
	<div class="order-footer mt10">
		<div class="text-right mt10">
			<?php
			if ($order['status']) {
				echo '<a href="' . $content->permalink . '" class="but c-blue">去查看</a>';
			} else if (($order['created'] + $order['timeout']) < time()) {
				echo '<a href="' . $content->permalink . '" class="but c-blue">重新购买</a>';
			} else {
			?>
				<a data-class="modal-mini full-sm" mobile-bottom="true" data-height="240" data-remote="<?= joe_api_url('close_order_modal', ['order_num' => '', 'order_id' => '']) ?>" class=" but mr6" href="javascript:;" data-toggle="RefreshModal">关闭订单</a><a data-class="modal-mini full-sm" mobile-bottom="true" data-height="330" data-remote="<?= joe_api_url('order_pay_modal', ['order_num' => '', 'order_id' => '', 'payment_id' => 1]) ?>" class=" but c-red" href="javascript:;" data-toggle="RefreshModal">立即支付</a>
			<?php
			}
			?>
		</div>
	</div>
</div>