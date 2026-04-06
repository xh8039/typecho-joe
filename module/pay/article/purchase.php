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
<div class="zib-widget pay-box  order-type-1" id="posts-pay">
	<div class="flex pay-flexbox">
		<div class="flex0 relative mr20 hide-sm pay-thumb">
			<div class="graphic"><img referrerpolicy="no-referrer" rel="noreferrer" data-thumb="default" src="<?= joe_lazyload_url() ?>" data-src="<?= joe_article_thumbnails_url($article)[0] ?>" alt="<?= $article->title ?>-<?= Helper::options()->title ?>" onerror="Joe.thumbnailError(this)" class="lazyload fit-cover" fancybox="false"><div class="abs-center text-center left-bottom"></div></div>
		</div>
		<div class="flex-auto-h flex xx jsb">
			<dt class="text-ellipsis pay-title"><?= $article->title ?></dt>
			<div class="mt6 em09 muted-2-color">此内容为付费阅读，请付费后查看</div>
			<div class="">
				<div class="price-box">
					<div class="c-red"><b class="em3x"><span class="pay-mark">￥</span><?= round($article->fields->price ?: 0, 2) ?></b></div>
				</div>
			</div>
			<div class="text-right mt10">
				<a data-class="modal-mini" mobile-bottom="true" data-height="300" data-remote="<?= joe_api_url('pay_cashier_modal', ['cid' => $article->cid]) ?>" class="cashier-link but jb-red" href="javascript:;" data-toggle="RefreshModal">立即购买</a><?= joe_user_alloc()->hasLogin() ? '' : '<div class="pay-extra-hide px12 mt6" style="font-size:12px;">您当前未登录！建议登陆后购买，可保存购买订单</div>' ?>
			</div>
		</div>
	</div>
	<div class="pay-tag abs-center"><i class="fa fa-book mr3"></i>付费阅读</div>
	<!-- <badge class="img-badge hot jb-blue px12">已售&nbsp;<?= $count ?></badge> -->
</div>