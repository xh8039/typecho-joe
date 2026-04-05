<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<div class="container fluid-widget"></div>
<footer class="footer">
	<div class="container-fluid container-footer">
		<?= base64_decode('PGEgaHJlZj0iaHR0cDovL2Jsb2cueWloYW5nLmluZm8iIHJlbD0iZnJpZW5kIiB0YXJnZXQ9Il9ibGFuayIgY2xhc3M9ImhpZGUiPuaYk+iIquWNmuWuojwvYT4='); ?>
		<ul class="list-inline">
			<li class="hidden-xs" style="max-width: 300px;">
				<p>
					<a class="footer-logo" href="/" title="<?php $this->options->title() ?>">
						<img referrerpolicy="no-referrer" rel="noreferrer" src="<?= joe_theme_url('assets/img/thumbnail-sm.svg', null) ?>" data-src="<?= joe_logo_url() ?>" switch-src="<?= joe_logo_url('dark') ?>" alt="<?= $this->options->title ?>" class="lazyload" style="height: 40px;">
					</a>
				</p>
				<div class="footer-muted em09"><?= $this->options->JFooterLeftText ?></div>
			</li>
			<li style="max-width: 550px;">
				<p class="fcode-links"><?= $this->options->JFooterCenter1 ?></p>
				<div class="footer-muted em09"><?= $this->options->JFooterCenter2 ?></div>
				<?php
				if ($this->options->JOnLineCountThreshold && is_numeric($this->options->JOnLineCountThreshold)) {
				?>
					<div class="footer-muted em09">当前在线人数 <span class="online-users-count"></span> 位</div>
				<?php
				}
				?>
				<div class="footer-contact mt10">
					<?php
					$footer_contacts = joe_footer_contact();
					foreach ($footer_contacts as $footer_contact) {
						echo $footer_contact;
					}
					?>
				</div>
			</li>
			<?php
			$JFooter_Right_Image = joe_optionMulti($this->options->JFooter_Right_Image);
			if (!empty($JFooter_Right_Image)) {
				echo '<li>';
				$JFooter_Right_Image = joe_optionMulti($this->options->JFooter_Right_Image);
				foreach ($JFooter_Right_Image as $value) {
			?>
					<div class="footer-miniimg" data-toggle="tooltip" title="<?= $value[0] ?? '' ?>">
						<p>
							<img referrerpolicy="no-referrer" class="lazyload" src="<?= joe_theme_url('assets/img/thumbnail-sm.svg') ?>" data-src="<?= $value[1] ?? '' ?>" alt="<?= $value[0] ?? '' ?>-<?= $this->options->title ?>">
						</p>
						<span class="opacity8 em09"><?= $value[0] ?? '' ?></span>
					</div>
			<?php
				}
				echo '</li>';
			}
			?>
		</ul>
		<?php
		if (!empty($this->options->JFcodeCustomizeCode)) echo '<p class="footer-conter">' . $this->options->JFcodeCustomizeCode . '</p>';
		?>
	</div>
</footer>
<div class="float-right round position-bottom <?= joe_is_mobile() ? 'filter' : '' ?> scroll-down-hide">
	<?php
	if (!joe_is_sdfkdifhb()) echo '<span style="--this-bg:rgba(255, 111, 6, 0.2);" class="float-btn more-btn hover-show nowave" data-placement="left" title="本站同款主题模板" href="javascript:;"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-gift-color"></use></svg><div style="width:240px;" class="hover-show-con dropdown-menu"><a href="http://blog.yihang.info/" target="_blank"><div class="flex c-red"><img class="flex0" alt="Joe再续前缘主题" src="'.joe_theme_url('assets/img/favicon.png').'" height="30"><div class="flex1 ml10"><dt>本站同款主题模板</dt><div class="px12 mt10 muted-color">Joe再续前缘主题是一款漂亮优雅的网站主题模板，功能强大，配置简单。</div><div class="but mt10 p2-10 c-blue btn-block px12">查看详情</div></div></div></a></div></span>';
	?>
	<!-- <a style="--this-color:#f2c97d;--this-bg:rgba(62,62,67,0.9);" class="float-btn pay-vip" vip-level="2" data-toggle="tooltip" data-placement="left" title="开通会员" href="javascript:;">
		<svg class="icon" aria-hidden="true">
			<use xlink:href="#icon-vip_1"></use>
		</svg>
	</a> -->
	
	<?php
	if (joe_is_pc()) {
		?>
		<a rel="nofollow" class="newadd-btns float-btn add-btn btn-newadd" href="<?= $this->user->hasLogin() ? joe_root_relative_link($this->options->adminUrl) . 'write-post.php' : joe_user_auth_url('login') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
		<!-- <a class="float-btn float-btn-shop-cart nowave" data-toggle="tooltip" data-placement="left" title="购物车" href="http://blog.yihang.info?shop_cart=1">
		<svg class="icon" aria-hidden="true">
			<use xlink:href="#icon-shopping-cart"></use>
		</svg>
		<badge cart-count=""></badge>
	</a> -->
	<!-- <a class="float-btn service-wechat hover-show nowave" title="扫码添加微信" href="javascript:;">
		<i class="fa fa-wechat"></i>
		<div class="hover-show-con dropdown-menu">
			<img class="radius4 relative" width="100%" class="lazyload" src="<?= joe_theme_url('assets/img/thumbnail-sm.svg', null) ?>" data-src="<?= joe_theme_url('assets/img/qrcode.png', null) ?>" alt="扫码添加微信-子比主题">
		</div>
	</a> -->
		<span class="float-btn qrcode-btn hover-show service-wechat">
			<i class="fa fa-qrcode"></i>
			<div class="hover-show-con dropdown-menu">
				<div class="qrcode" data-size="100"></div>
				<div class="mt6 px12 muted-color">在手机上浏览此页面</div>
			</div>
		</span>
		<?php
	}
	?>
	<a class="float-btn ontop fade" data-toggle="tooltip" data-placement="left" title="返回顶部" href="javascript:(scrollTopTo());"><i class="fa fa-angle-up em12"></i></a>
</div>
<?php
if (joe_is_mobile()) {
?>
	<div class="footer-tabbar">
		<?php
		if ($this->is('post')) {
			?>
			<div class="flex ac jsb virtual-input tabbar-item" fixed-input="#respond"><div class="flex flex1 ac"><img alt="<?= $this->author->screenName ?>的头像-<?php $this->options->title() ?>" src="<?= joe_avatar_lazyload_url() ?>" data-src="<?= joe_get_avatar_by_mail($this->author->mail) ?>" class="lazyload avatar avatar-id-<?= $this->author->uid ?>"><div class="text-ellipsis simulation mr10">欢迎您留下宝贵的见解！</div></div><span class="but c-blue">提交</span></div>
			<a href="javascript:;" data-action="like" class="tabbar-item single-action-tabbar" data-pid="<?= $this->cid ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><text>点赞</text><count><?= number_format($this->agree) ?></count></a>
			<!-- <a href="javascript:;" data-action="favorite" class="tabbar-item single-action-tabbar" data-pid="<?= $this->cid ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-favorite"></use></svg><text>收藏</text><count></count></a> -->
			<a class="tabbar-item single-action-tabbar" href="javascript:;" data-toggle="modal" data-target="#rewards-modal-1" data-remote="<?= joe_api_url('user_rewards_modal?id=1') ?>" class="rewards action action-rewards"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-money"></use></svg><text>赞赏</text></a>
			<a data-class="modal-mini" mobile-bottom="true" data-height="243" data-remote="<?= joe_api_url('share_modal',['id'=>$this->cid,'type'=>'post']) ?>" class="tabbar-item single-action-tabbar" href="javascript:;" data-toggle="RefreshModal"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-share"></use></svg><text>分享</text></a>
			<?php
		} else {
			echo joe_footer_tab_bar();
		}
		?>
	</div>
	<div class="footer-tabbar-placeholder"></div>
<?php
}
// SSL安全认证
if (joe_is_pc() && $this->options->JPendant_SSL == 'on') {
?>
	<div id="cc-myssl-seal" style="width:65px;height:65px;z-index:9;position:fixed;right:0;bottom:0;cursor:pointer;">
		<div title="TrustAsia 安全签章" id="myssl_seal" style="text-align: center">
			<img src="<?= joe_theme_url('assets/img/myssl-id.png') ?>" alt="SSL" style="width: 100%; height: 100%"></a>
		</div>
	</div>
<?php
}
$this->need('module/modal/signout.php');
$this->need('module/modal/notice.php');
?>

<!-- 自定义底部HTML代码 -->
<?php $this->options->JCustomBodyEnd() ?>
<!-- 自定义底部HTML代码 -->

<?php
$this->need('module/js.php');
$this->footer();
?>

<!-- 网站统计HTML代码 -->
<?php $this->options->JCustomTrackCode() ?>
<!-- 网站统计HTML代码 -->