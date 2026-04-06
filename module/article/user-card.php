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

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<div class="user-card zib-widget author">
	<div class="card-content mt10 relative">
		<div class="user-content">
			<div class="user-avatar"><a href="<?= $this->author->permalink ?>"><span class="avatar-img avatar-lg"><img alt="<?= $this->author->screenName ?>的头像-<?php $this->options->title(); ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_avatar_url_by_mail($this->author->mail) ?>" class="lazyload avatar avatar-id-<?= $this->author->uid ?>"></span></a></div>
			<div class="user-info mt20 mb10">
				<div class="user-name flex jc"><name class="flex1 flex ac"><a class="display-name text-ellipsis " href="<?= $this->author->permalink ?>"><?= $this->author->screenName ?></a><?php
				if ($this->user->hasLogin()) {
					if ($this->author->uid !== $this->user->uid) {
						?><a href="javascript:;" data-action="follow_user" class="focus-color ml10 follow flex0" data-pid="<?= $this->author->uid ?>"><count><i class="fa fa-heart-o mr3" aria-hidden="true"></i>关注</count></a><?php
					}
				} else {
					?><a href="javascript:;" class="focus-color ml10 follow flex0 signin-loader" data-pid="<?= $this->author->uid ?>"><count><i class="fa fa-heart-o mr3" aria-hidden="true"></i>关注</count></a><?php
				}
				?></name></div>
				<div class="author-tag mt10 mini-scrollbar">
					<?php
					$PostsNum = joe_number_word(Db::name('contents')->where(['authorId' => $this->author->uid, 'type' => 'post', 'status' => 'publish'])->count());
					$commentsNum = joe_number_word(joe_user_comment_count($this->author->uid));
					$agree = joe_number_word(joe_author_content_field_sum($this->author->uid, 'agree'));
					$views = joe_number_word(joe_author_content_field_sum($this->author->uid, 'views'));
					?>
					<a class="but c-blue tag-posts" data-toggle="tooltip" title="共<?= $PostsNum ?>篇文章" href="<?= $this->author->permalink ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-post"></use></svg><?= $PostsNum ?></a>
					<a class="but c-green tag-comment" data-toggle="tooltip" title="共<?= $commentsNum ?>条评论" href="<?= joe_relative_url($this->author->permalink) ?>?tab=comment"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?= $commentsNum ?></a>
					<span class="badg c-yellow tag-like" data-toggle="tooltip" title="获得<?= $agree ?>个点赞"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= $agree ?></span>
					<span class="badg c-red tag-view" data-toggle="tooltip" title="人气值 <?= $views ?>"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-hot"></use></svg><?= $views ?></span>
				</div>
				<div class="user-desc mt10 muted-2-color em09"><span class="yiyan" type="cn">这家伙很懒，什么都没有写...</span></div>
			</div>
		</div>
		<?php
		$this->widget('Widget_Contents_Post_Author', 'cid=' . $this->cid . '&authorId=' . $this->author->uid . '&limit=5')->to($posts);
		if ($posts->have()) {
		?>
			<div class="swiper-container more-posts swiper-scroll">
				<div class="swiper-wrapper">
					<?php
					while ($posts->next()) {
					?>
						<div class="swiper-slide mr10">
							<a href="<?php $posts->permalink(); ?>">
								<div class="graphic hover-zoom-img em09 style-3" style="padding-bottom: 70%!important;">
									<img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" class="fit-cover lazyload" data-src="<?= joe_article_thumbnails_url($posts)[0] ?>" src="<?= joe_lazyload_url(); ?>" alt="<?= $posts->title(); ?>-<?php $this->options->title(); ?>">
									<div class="abs-center left-bottom graphic-text text-ellipsis"><?= $posts->title(); ?></div>
									<div class="abs-center left-bottom graphic-text">
										<div class="em09 opacity8"><?= $posts->title(); ?></div>
										<div class="px12 opacity8 mt6">
											<item><?= joe_date_word($this->dateWord) ?></item>
											<item class="pull-right">
												<svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg>2
											</item>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php
					}
					?>
				</div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		<?php
		}
		?>
	</div>
</div>