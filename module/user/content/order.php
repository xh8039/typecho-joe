<div class="ajaxpager tab-pane fade <?= $tab_name == 'order' ? 'in active' : '' ?>" id="user-tab-order">
	<?php
	if ($tab_name == 'order') {
		$wait_pay_count = think\facade\Db::name('orders')->where(['user_id' => $this->user->uid, 'status' => 0])->where('created', '<>', '0')->whereRaw('created > (' . time() . ' - timeout)')->count();
	?>
		<div class="ajax-item">
			<div class="user-order-tabs">
				<div class="index-tab rectangular relative mb10">
					<ul class="list-inline scroll-x mini-scrollbar">
						<li class="<?= $this->request->get('tab', 'all') === 'all' ? 'active' : '' ?>"><a data-target="#user-order-tab-all" href="javascript:;" data-route="<?= joe_build_url('user/order', ['tab' => 'all']) ?>" data-toggle="tab" data-ajax>全部</a></li>
						<li class="<?= $this->request->get('tab') === 'wait-pay' ? 'active' : '' ?>"><a data-target="#user-order-tab-wait-pay" href="javascript:;" data-route="<?= joe_build_url('user/order', ['tab' => 'wait-pay']) ?>" data-toggle="tab" data-ajax>待支付<?= empty($wait_pay_count) ? '' : '<badge class="ml3 b-red">' . $wait_pay_count . '</badge>' ?></a></li>
					</ul>
				</div>
				<div class="tab-content main-tab-content">
					<div class="ajaxpager tab-pane fade <?= $this->request->get('tab', 'all') === 'all' ? 'active in' : '' ?>" id="user-order-tab-all">
						<?= $this->request->get('tab', 'all') === 'all' ? '<div class="ajaxpager lazyload user-pay-statistical mb20" lazyload-action="ias">' : '' ?>
						<span class="post_ajax_trigger <?= $this->request->get('tab', 'all') === 'all' ? 'hide' : '' ?>"><a <?= $this->request->get('tab', 'all') === 'all' ? 'ajaxpager-target=".ajaxpager"' : 'no-scroll="1"' ?> ajax-href="<?= joe_api_url('user_pay_order', ['tab' => 'all']) ?>" class="ajax_load ajax-next ajax-open"></a></span>
						<div class="post_ajax_loader">
							<div class="zib-widget">
								<p class="placeholder k1"></p>
								<p class="placeholder t1"></p>
								<i class="placeholder s1"></i>
								<i class="placeholder s1 ml10"></i>
							</div>
							<div class="zib-widget">
								<p class="placeholder k1"></p>
								<p class="placeholder t1"></p>
								<i class="placeholder s1"></i>
								<i class="placeholder s1 ml10"></i>
							</div>
							<div class="zib-widget">
								<p class="placeholder k1"></p>
								<p class="placeholder t1"></p>
								<i class="placeholder s1"></i>
								<i class="placeholder s1 ml10"></i>
							</div>
						</div>
						<?= $this->request->get('tab', 'all') === 'all' ? '</div>' : '' ?>
					</div>
					<div class="ajaxpager tab-pane fade <?= $this->request->get('tab') === 'wait-pay' ? 'active in' : '' ?>" id="user-order-tab-wait-pay">
						<?= $this->request->get('tab') === 'wait-pay' ? '<div class="ajaxpager lazyload user-pay-statistical mb20" lazyload-action="ias">' : '' ?>
						<span class="post_ajax_trigger <?= $this->request->get('tab') === 'wait-pay' ? 'hide' : '' ?>"><a <?= $this->request->get('tab') === 'wait-pay' ? 'ajaxpager-target=".ajaxpager"' : 'no-scroll="1"' ?> ajax-href="<?= joe_api_url('user_pay_order', ['tab' => 'wait-pay']) ?>" class="ajax_load ajax-next ajax-open"></a></span>
						<div class="post_ajax_loader">
							<div class="mt20 mb20">
								<i class="placeholder s1" style=" height: 20px; "></i>
								<i class="placeholder s1 ml10" style=" height: 20px; width: 120px; "></i>
								<p class="placeholder k1"></p>
								<p class="placeholder k2"></p>
							</div>
							<div class="mt10 mb20">
								<i class="placeholder s1" style=" height: 20px; "></i>
								<i class="placeholder s1 ml10" style=" height: 20px; width: 120px; "></i>
								<p class="placeholder k1"></p>
								<p class="placeholder k2"></p>
							</div>
							<div class="mt10 mb20">
								<i class="placeholder s1" style=" height: 20px; "></i>
								<i class="placeholder s1 ml10" style=" height: 20px; width: 120px; "></i>
								<p class="placeholder k1"></p>
								<p class="placeholder k2"></p>
							</div>
						</div>
						<?= $this->request->get('tab') === 'wait-pay' ? '</div>' : '' ?>
					</div>
				</div>
			</div>
		</div>
		<div class="ajax-pag hide">
			<div class="next-page ajax-next">
				<a href="#"></a>
			</div>
		</div>
	<?php
	} else {
	?>
		<span class="post_ajax_trigger hide">
			<a href="<?= joe_build_url('user/order') ?>" class="ajax_load ajax-next ajax-open"></a>
		</span>
	<?php
	}
	?>
	<div class="post_ajax_loader" style="display: none;">
		<div class="row gutters-10 user-pay">
			<div class="col-sm-6">
				<div class="zib-widget">
					<div class="placeholder s1"></div>
					<div class="em3x c-blue">--</div>
					<i class="placeholder s1 mr10"></i>
					<i class="placeholder s1"></i>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="zib-widget">
					<div class="placeholder s1"></div>
					<div class="em3x c-blue">--</div>
					<i class="placeholder s1 mr10"></i>
					<i class="placeholder s1"></i>
				</div>
			</div>
		</div>
		<div class="box-body notop">
			<div class="title-theme">
				<b>订单明细</b>
			</div>
		</div>
		<div class="zib-widget">
			<p class="placeholder k1"></p>
			<p class="placeholder t1"></p>
			<i class="placeholder s1"></i>
			<i class="placeholder s1 ml10"></i>
		</div>
		<div class="zib-widget">
			<p class="placeholder k1"></p>
			<p class="placeholder t1"></p>
			<i class="placeholder s1"></i>
			<i class="placeholder s1 ml10"></i>
		</div>
		<div class="zib-widget">
			<p class="placeholder k1"></p>
			<p class="placeholder t1"></p>
			<i class="placeholder s1"></i>
			<i class="placeholder s1 ml10"></i>
		</div>
	</div>
</div>