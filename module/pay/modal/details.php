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

if ($timeout) {
	?><div class="touch text-center mb20"><div class="font-bold">交易关闭</div><div class="px12 muted-2-color font-normal">超时自动关闭</div></div><?php
} else {
	?>
	<div class="touch text-center mb20">
		<div class="c-yellow mb6 font-bold"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-time"></use></svg>待支付</div>
		<div class="mt6 em09 muted-2-color">剩余<span class="c-yellow badg badg-sm" int-second="1" data-over-text="<?= ($order['create_time'] + $order['timeout']) - time() ?>秒" data-countdown="<?= $countdown ?>"></span>自动关闭订单</div>
	</div>
	<?php
}
?>
<button class="close abs-close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
<div class="mini-scrollbar scroll-y max-vh7">
	<div class="zib-widget">
		<div class="order-item user-order-item order-type-1">
			<div class="order-content flex mb10">
				<div class="order-thumb mr10"><img data-thumb="default" src="<?= joe_lazyload_url() ?>" data-src="<?= joe_article_thumbnails_url($article)[0] ?>" alt="<?= $article->title ?>-<?= $options->title ?>" class="lazyload radius8 fit-cover"></div>
				<div class="flex1 flex jsb xx">
					<div class="flex1 flex jsb">
						<div class="flex1 mr10"><div class="order-title text-ellipsis mb6"><a href="<?= joe_relative_url($article->permalink) ?>" class="text-ellipsis mb6 font-bold"><?= $article->title ?></a></div></div>
						<div class="flex xx ab">
							<div class="unit-price"><span class="pay-mark px12">￥</span><b><?= $price ?></b></div>
							<div class="count mt6 muted-color">x1</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="info-content">
			<div class="flex ac jsb padding-h6">
				<div class="flex0 mr6 muted-2-color">应付</div>
				<div class="flex0"><span class="pay-mark px12">￥</span><b><?= $price ?></b></div>
			</div>
			<div class="flex ac jsb padding-h6">
				<div class="flex0 mr6 muted-2-color">订单类型</div>
				<div class="flex0">付费阅读</div>
			</div>
			<div class="flex ac jsb padding-h6">
				<div class="flex0 mr10 muted-2-color">订单编号</div>
				<div class="ml20 overflow-hidden flex ac">
					<div class="text-ellipsis"><?= $order['trade_no'] ?></div><a href="javascript:;" class="flex flex0 ac copy-text icon-spot" data-clipboard-tag="订单号" data-clipboard-text="<?= $order['trade_no'] ?>">复制</a>
				</div>
			</div>
			<div class="flex ac jsb padding-h6">
				<div class="flex0 mr6 muted-2-color">创建时间</div>
				<div class="flex0"><?= joe_date($order['created']) ?></div>
			</div>
		</div>
	</div>
</div>
<div class="flex ac jsb modal-full-footer">
	<div class="flex1"><a href="<?= joe_relative_url($article->author->permalink) ?>" class="but">作者主页</a></div>
	<div class="flex0"><a href="<?= joe_relative_url($article->permalink) ?>" class="but c-blue">重新购买</a></div>
</div>