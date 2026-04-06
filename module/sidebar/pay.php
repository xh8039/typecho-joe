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

if ($this->fields->price > 0) {
	$order = joe_article_user_order($this->cid);
	if ($order) $order_count = Db::name('orders')->where(['content_cid' => $this->cid, 'status' => 1])->count();
?>
	<div>
		<div class="zib-widget pay-box pay-widget order-type-1" style="padding: 0;">
			<badge class="pay-tag abs-center"><i class="fa fa-book mr3"></i>付费阅读</badge>
			<div class="relative-h jb-red" style="background-size:120%;">
				<div class="absolute radius jb-red" style="height: 200px;left: 75%;width: 200px;top: -34%;border-radius: 100%;"></div>
				<div class="absolute jb-red radius" style="height: 305px;width: 337px;left: -229px;border-radius: 100%;opacity: .7;"></div>
				<div class="relative box-body">
					<?php
					if ($order) {
					?>
					<div class="text-center mt10 box-body"><p><i class="fa fa-shopping-bag fa-3x" aria-hidden="true"></i></p><b class="em14">已购买</b></div>
					<div class="em09 paid-info">
						<div class="flex jsb"><span>订单号</span><span><a rel="nofollow" target="_blank" href="<?= joe_build_url('user/order') ?>" class=""><?= $order['trade_no'] ?></a></span></div>
						<div class="flex jsb"><span>支付时间</span><span><?= $order['update_time'] ?? joe_date($order['modified']) ?></span></div>
						<div class="flex jsb"><span>支付金额</span><span><span class="pay-mark">￥</span><?= $order['pay_price'] ?></span></div>
					</div>
					<?php
					} else {
						?><div class="price-box"><div class="text-center mt10"><b class="em3x"><span class="pay-mark">￥</span><?= $this->fields->price ?></b></div></div><?php
					}
					?>
				</div>
				<?= $order ? '' : '<div class="relative"></div>' ?>
			</div>
			<div class="box-body">
				<div class="mt10">
					<?php
					if ($order) {
						?><a href="javascript:(scrollTopTo('#posts-pay',-50));" class="but padding-lg btn-block jb-red"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i>查看内容</a><?php
					} else {
						?><a data-class="modal-mini" mobile-bottom="true" data-height="300" data-remote="<?= joe_api_url('pay_cashier_modal', ['cid' => $this->cid]) ?>" class="cashier-link but jb-red" href="javascript:;" data-toggle="RefreshModal">立即购买</a><?php
					}
					?>
				</div>
			</div>
			<?= $order ? '<badge class="img-badge hot jb-blue px12">已售&nbsp;'.$order_count.'</badge>' : '' ?>
		</div>
	</div>
<?php
} else {
?>
	<div>
		<div class="zib-widget pay-box pay-widget order-type-1" style="padding: 0;">
			<div class="relative-h jb-red" style="background-size:120%;"><div class="absolute radius jb-red" style="height: 200px;left: 75%;width: 200px;top: -34%;border-radius: 100%;"></div><div class="absolute jb-red radius" style="height: 305px;width: 337px;left: -229px;border-radius: 100%;opacity: .7;"></div><div class="relative box-body"><div class="text-center mt10 box-body"><p><i class="fa fa-shopping-bag fa-3x" aria-hidden="true"></i></p><b class="em14">免费内容</b></div></div></div>
			<div class="box-body">
				<div class="mt10">
					<?php
					if ($this->user->hasLogin()) {
						$comment = think\facade\Db::name('comments')->where(['cid' => $this->cid, 'mail' => $this->user->mail])->find();
						if ($comment) {
							echo '<a href="javascript:(scrollTopTo(\'#posts-pay\',-50));" class="but padding-lg btn-block jb-red"><i class="fa fa-dot-circle-o fa-fw" aria-hidden="true"></i>查看内容</a>';
						} else {
							echo '<a href="javascript:(scrollTopTo(\'#comments\',-50));" class="but padding-lg btn-block jb-red"><i class="fa fa-comment"></i>评论查看</a>';
						}
					} else {
						echo '<a href="javascript:;" class="but signin-loader padding-lg btn-block jb-red"><i class="fa fa-sign-in"></i>登录评论</a>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
<?php
}
?>