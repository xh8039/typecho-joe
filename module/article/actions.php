<div class="text-center post-actions">
	<a href="javascript:;" data-action="like" class="action action-like" data-pid="<?= $this->cid ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><text>点赞</text><count><?= number_format($this->agree) ?></count></a>
	<a href="javascript:;" data-toggle="modal" data-target="#rewards-modal-1" data-remote="<?= joe_api_url('user_rewards_modal?id=1') ?>" class="rewards action action-rewards"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-money"></use></svg><text>赞赏</text></a>
	<?php
	if (joe_is_mobile()) {
		?>
		<a data-class="modal-mini" mobile-bottom="true" data-height="243" data-remote="<?= joe_api_url('share_modal',['id'=>$this->cid,'type'=>'post']) ?>" class="action action-share" href="javascript:;" data-toggle="RefreshModal"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-share"></use></svg><text>分享</text></a>
		<?php
	}else {
		?>
	<span class="hover-show dropup action action-share">
		<svg class="icon" aria-hidden="true"><use xlink:href="#icon-share"></use></svg>
		<text>分享</text>
		<div class="zib-widget hover-show-con share-button dropdown-menu">
			<div>
				<?php
				$url = urlencode($this->permalink);
				$title = urlencode($this->title.' - '.$this->options->title);
				$pic = urlencode(joe_thumbnails_url($this)[0]);
				$desc = urlencode($this->title);
				?>
				<a rel="nofollow" class="share-btn qzone" target="_blank" title="QQ空间" href="<?= joe_externa_to_internal_link("https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=$url&title=$title&pics=$pic&summary=$desc")['url'] ?>"><icon><svg class="icon" aria-hidden="true"><use xlink:href="#icon-qzone-color"></use></svg></icon><text>QQ空间<text></a>
				<a rel="nofollow" class="share-btn weibo" target="_blank" title="微博" href="<?= joe_externa_to_internal_link("https://service.weibo.com/share/share.php?url=$url&title=$title&pic=$pic&searchPic=true")['url'] ?>"><icon><svg class="icon" aria-hidden="true"><use xlink:href="#icon-weibo-color"></use></svg></icon><text>微博<text></a>
				<a rel="nofollow" class="share-btn qq" target="_blank" title="QQ好友" href="<?= joe_externa_to_internal_link("https://connect.qq.com/widget/shareqq/index.html?url=$url&title=$title&pics=$pic&desc=$desc")['url'] ?>"><icon><svg class="icon" aria-hidden="true"><use xlink:href="#icon-qq-color"></use></svg></icon><text>QQ好友<text></a>
				<a rel="nofollow" class="share-btn poster" poster-share="<?= $this->cid ?>" title="海报分享" href="javascript:;"><icon><svg class="icon" aria-hidden="true"><use xlink:href="#icon-poster-color"></use></svg></icon><text>海报分享<text></a>
				<a rel="nofollow" class="share-btn copy" data-clipboard-text="<?= $this->permalink ?>" data-clipboard-tag="链接" title="复制链接" href="javascript:;"><icon><svg class="icon" aria-hidden="true"><use xlink:href="#icon-copy-color"></use></svg></icon><text>复制链接<text></a>
			</div>
		</div>
	</span>
		<?php
	}
	?>
	<!-- <a href="javascript:;" data-action="favorite" class="action action-favorite" data-pid="1">
		<svg class="icon" aria-hidden="true"><use xlink:href="#icon-favorite"></use></svg>
		<text>收藏</text>
		<count></count>
	</a> -->
</div>
<div class="modal fade" id="rewards-modal-1" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-mini rewards-popover" style="" role="document">
		<div class="modal-content">
			<div style="padding: 1px;">
				<div class="modal-colorful-header colorful-bg jb-blue">
					<button class="close" data-dismiss="modal"><svg class="ic-close" aria-hidden="true"><use xlink:href="#icon-close"></use></svg></button>
					<div class="colorful-make"></div>
					<div class="text-center"><div class="em2x"><i class="loading"></i></div></div>
				</div>
				<div class="modal-body">
					<ul class="flex jse mb10 text-center rewards-box">
						<li>
							<p class="placeholder s1"></p>
							<div class="rewards-img"><h4 class="placeholder fit-cover"></h4></div>
						</li>
						<li>
							<p class="placeholder s1"></p>
							<div class="rewards-img"><h4 class="placeholder fit-cover"></h4></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>