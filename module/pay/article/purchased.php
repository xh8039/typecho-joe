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
<div class="zib-widget pay-box paid-box" id="posts-pay">
	<div class="flex ac jb-green padding-10 em09">
		<div class="text-center flex-auto"><div class="mb6"><i class="fa fa-shopping-bag fa-2x" aria-hidden="true"></i></div><b class="em12">已购买</b></div>
		<div class="em09 paid-info flex-auto">
			<div class="flex jsb"><span>订单号</span><span><?= $order['trade_no'] ?></span></div>
			<div class="flex jsb"><span>支付时间</span><span><?= $order['update_time'] ?></span></div>
			<div class="flex jsb"><span>支付金额</span><span><span class="pay-mark">￥</span><?= $order['pay_price'] ?></span></div>
		</div>
	</div>
	<div class="box-body relative">
		<badge class="img-badge hot jb-blue px12">已售&nbsp;<?= $count ?></badge>
		<div style="padding-right: 48px;"><span class="badg c-red hollow badg-sm mr6"><i class="fa fa-book mr3"></i>付费阅读</span><b><?= $article->title ?></b></div>
	</div>
</div>