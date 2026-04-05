<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<div class="user-card zib-widget author">
	<div class="card-content mt10 relative">
		<div class="user-content">
			<div class="user-avatar">
				<a href="<?= $this->author->permalink ?>">
					<span class="avatar-img avatar-lg">
						<img alt="<?= $this->author->screenName ?>的头像-<?php $this->options->title(); ?>" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($this->author->mail) ?>" class="lazyload avatar avatar-id-<?= $this->author->uid ?>">
					</span>
				</a>
			</div>
			<div class="user-info mt20 mb10">
				<div class="user-name flex jc"><name class="flex1 flex ac"><a class="display-name text-ellipsis " href="<?= $this->author->permalink ?>"><?= $this->author->screenName ?></a></name></div>
				<div class="author-tag mt10 mini-scrollbar">
					<?php
					$PostsNum = think\facade\Db::name('contents')->where(['authorId' => $this->author->uid, 'type' => 'post', 'status' => 'publish'])->count();
					$PostsNum = joe_number_word($PostsNum);
					$commentsNum = joe_number_word(joe_author_content_field_sum($this->author->uid, 'commentsNum'));
					$agree = joe_number_word(joe_author_content_field_sum($this->author->uid, 'agree'));
					$views = joe_number_word(joe_author_content_field_sum($this->author->uid, 'views'));
					?>
					<a class="but c-blue tag-posts" data-toggle="tooltip" title="共<?= $PostsNum ?>篇文章" href="<?= $this->author->permalink ?>">
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-post"></use>
						</svg><?= $PostsNum ?>
					</a>
					<a class="but c-green tag-comment" data-toggle="tooltip" title="共<?= $commentsNum ?>条评论" href="<?= $this->author->permalink ?>?tab=comment">
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-comment"></use>
						</svg><?= $commentsNum ?>
					</a>
					<span class="badg c-yellow tag-like" data-toggle="tooltip" title="获得<?= $agree ?>个点赞">
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-like"></use>
						</svg><?= $agree ?>
					</span>
					<span class="badg c-red tag-view" data-toggle="tooltip" title="人气值 <?= $views ?>">
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-hot"></use>
						</svg><?= $views ?>
					</span>
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
									<img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" class="fit-cover lazyload" data-src="<?= joe_thumbnails_url($posts)[0] ?>" src="<?= joe_lazyload_url(); ?>" alt="<?= $posts->title(); ?>-<?php $this->options->title(); ?>">
									<div class="abs-center left-bottom graphic-text text-ellipsis"><?= $posts->title(); ?></div>
									<div class="abs-center left-bottom graphic-text">
										<div class="em09 opacity8"><?= $posts->title(); ?></div>
										<div class="px12 opacity8 mt6">
											<item><?= joe_dateWord($this->dateWord) ?></item>
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