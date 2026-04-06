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

use think\facade\Db;

$order = Db::name('orders')->where([
	'content_cid' => $request->get('cid'),
	'user_id' => JOE_USER_ID,
	'status' => 0
])->where('created', '<>', '0')->whereRaw(''.time().' < (created + timeout)')->order('created', 'desc')->find();
if ($order) {
	$price = $order['pay_price'] ?? $order['money'];
	$countdown = joe_date($order['created'] + $order['timeout']);
	return include JOE_ROOT . 'module/pay/modal/countdown.php';
}

?>
<div class="modal-colorful-header colorful-bg jb-blue">
	<button class="close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
	<div class="colorful-make"></div>
	<div class="text-center">
		<div class="em2x"><i class="fa fa-cart-plus"></i></div>
		<div class="mt10 em12 padding-w10">确认购买</div>
	</div>
</div>
<div class="mb10 order-type-1"><span class="pay-tag badg badg-sm mr6"><i class="fa fa-book mr3"></i>付费阅读</span><span><?= $article->title ?></span></div>
<div class="mb10 muted-box padding-h6 line-16">
	<div class="flex jsb ab"><span class="muted-2-color">价格</span>
		<div><span><span class="pay-mark px12">￥</span><span class="em14"><?= $price ?></span></span></div>
	</div>
</div>
<form>
	<input type="hidden" name="post_id" value="<?= $article->cid ?>">
	<input type="hidden" name="order_type" value="1">
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
		<input type="hidden" name="action" value="submit_order">
		<button class="mt6 but jb-red initiate-pay btn-block radius">立即支付<span class="pay-price-text"><span class="px12 ml10">￥</span><span class="actual-price-number" data-price="<?= $price ?>"><?= $price ?></span></span></button>
	</div>
</form>
<script>document.querySelector('.payment-method-radio').click()</script>