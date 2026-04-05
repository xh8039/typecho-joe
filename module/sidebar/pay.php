 <div>
 	<div class="zib-widget pay-box pay-widget order-type-1" style="padding: 0;">
 		<badge class="pay-tag abs-center"><i class="fa fa-book mr3"></i>付费阅读</badge>
 		<div class="relative-h jb-red" style="background-size:120%;">
 			<div class="absolute radius jb-red" style="height: 200px;left: 75%;width: 200px;top: -34%;border-radius: 100%;"></div>
 			<div class="absolute jb-red radius" style="height: 305px;width: 337px;left: -229px;border-radius: 100%;opacity: .7;"></div>
 			<div class="relative box-body">
 				<div class="price-box"><div class="text-center mt10"><b class="em3x"><span class="pay-mark">￥</span><?= $this->fields->price ?></b></div></div>
 			</div>
 			<div class="relative"></div>
 		</div>
 		<div class="box-body">
 			<div class="mt10"><a data-class="modal-mini" mobile-bottom="true" data-height="300" data-remote="<?= joe_api_url('pay_cashier_modal',['cid'=>$this->cid]) ?>" class="cashier-link but jb-red" href="javascript:;" data-toggle="RefreshModal">立即购买</a></div>
 		</div>
 	</div>
 </div>