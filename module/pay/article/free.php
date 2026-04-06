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

if ($comment) {
	?>
	<div class="pay-box zib-widget paid-box order-type-1" id="posts-pay"><div class="box-body relative"><div><span class="badg c-red hollow badg-sm mr6"><i class="fa fa-book mr3"></i>免费阅读</span><b>免费资源</b></div></div></div>
	<?php
} else {
	?>
<div class="zib-widget pay-box  order-type-1" id="posts-pay">
	<div class="flex pay-flexbox">
		<div class="flex0 relative mr20 hide-sm pay-thumb">
			<div class="graphic">
				<img referrerpolicy="no-referrer" rel="noreferrer" data-thumb="default" src="<?= joe_lazyload_url() ?>" data-src="<?= joe_article_thumbnails_url($article)[0] ?>" alt="<?= $article->title ?>-<?= Helper::options()->title ?>" onerror="Joe.thumbnailError(this)" class="lazyload fit-cover" fancybox="false">
				<div class="abs-center text-center left-bottom"></div>
			</div>
		</div>
		<div class="flex1 flex xx jsb">
			<dt class="text-ellipsis pay-title"><?= $article->title ?></dt>
			<div class="mt6 em09 muted-2-color">此内容为免费阅读，请评论后查看</div>
			<div class="hide-sm">
				<div class="price-box"><div class="c-red"><b class="em3x"><span class="pay-mark">￥</span>0</b></div></div>
			</div>
			<div class="text-right mt10">
				<div class="">
					<?php
					if (joe_user_alloc()->hasLogin()) {
						echo '<a href="javascript:(scrollTopTo(\'#comments\',-50));" class="but padding-lg btn-block jb-blue"><i class="fa fa-comment"></i>评论查看</a>';
					} else {
						echo '<a href="javascript:;" class="but signin-loader padding-lg btn-block jb-blue"><i class="fa fa-sign-in"></i>登录评论</a>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="pay-tag abs-center"><i class="fa fa-book mr3"></i>免费阅读</div>
	<badge class="img-badge hot jb-blue px12">已评论&nbsp;<?= $article->commentsNum ?></badge>
</div>
	<?php
}
?>