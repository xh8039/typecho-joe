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
<div class="touch border-title flex jc font-bold">立即支付<span class="ml6 c-yellow px12 badg badg-sm" int-second="1" data-over-text="交易已关闭" data-countdown="<?= $countdown ?>"></span></div>
<button class="close abs-close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
<div class="mini-scrollbar scroll-y paid-modal-content">
	<div class="paid-modal-lists-box">
		<div class="show-order-modal flex mb10 order-item border-bottom ac padding-h10" data-order-id="<?= $order['id'] ?>">
			<div class="order-thumb mr10"><img class="radius8 fit-cover" src="<?= joe_article_thumbnails_url($article)[0] ?>" alt="<?= $article->title ?>-<?= $options->title ?>"></div>
			<div class="flex1 flex jsb xx">
				<div class="flex1 flex jsb">
					<div class="flex1 mr20">
						<div class="order-title text-ellipsis mb6">付费阅读</div>
						<div class="muted-color em09 mt6 text-ellipsis"><?= $order['trade_no'] ?></div>
					</div>
					<div class="flex xx ab">
						<div class="unit-price"><?= $price ?></div>
						<div class="count mt6 muted-color">x1</div>
					</div>
				</div>
			</div>
			<i class="fa fa-angle-right em12 ml10 muted-2-color"></i>
		</div>
	</div>
	<div class="order-info-box muted-box mb10">
		<div class="order-info-body">
			<div class="order-info-item flex at jsb mb10">
				<div class="item-label muted-color">支付单号</div>
				<div class="item-value"><?= $order['trade_no'] ?></div>
			</div>
			<div class="order-info-item flex at jsb mb10">
				<div class="item-label muted-color">总价<span class="muted-3-color px12">共1件</span></div>
				<div class="item-value"><div class="order-pay-prices-box flex abl xx"><div class="order-pay-prices-item flex abl"><span class="pay-mark px12">￥</span><span class="price-str"><?= $price ?></span></div></div></div>
			</div>
			<div class="order-info-item flex ac jsb">
				<div class="item-label muted-color">合计</div>
				<div class="item-value"><div class="order-pay-prices-box flex abl xx"><div class="order-pay-prices-item flex abl c-red em12"><span class="pay-mark px12">￥</span><span class="price-str"><?= $price ?></span></div></div></div>
			</div>
		</div>
	</div>
</div>
<form class="mt10">
	<input type="hidden" name="payment_modal" value="true">
	<input type="hidden" name="payment_id" value="<?= $order['id'] ?>">
	<input type="hidden" name="return_url" value="<?= $article->permalink ?>">
	<div class="dependency-box">
		<div class="muted-2-color em09 mb6">请选择支付方式</div>
		<div class="flex mb10">
			<?php
			if ($options->JWeChatPay == 'on') {
				?><div class="flex jc hh payment-method-radio hollow-radio flex-auto pointer active" data-for="payment_method" data-value="wechat"><img src="<?= joe_theme_url('assets/plugin/pay/img/pay-wechat-logo.svg') ?>" alt="wechat-logo"><div>微信</div></div><?php
			}
			if ($options->JAlipayPay == 'on') {
				?><div class="flex jc hh payment-method-radio hollow-radio flex-auto pointer" data-for="payment_method" data-value="alipay"><img src="<?= joe_theme_url('assets/plugin/pay/img/pay-alipay-logo.svg') ?>" alt="alipay-logo"><div>支付宝</div></div><?php
			}
			?>
		</div>
		<input type="hidden" name="payment_method" value="wechat">
		<input type="hidden" name="action" value="initiate_pay">
		<button class="mt6 but jb-red initiate-pay btn-block radius">立即支付<span class="pay-price-text"><span class="px12 ml10">￥</span><span class="actual-price-number" data-price="<?= $price ?>"><?= $price ?></span></span></button>
	</div>
</form>
<script>document.querySelector('.payment-method-radio').click()</script>