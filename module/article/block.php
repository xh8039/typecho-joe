<div data-pid="<?= $article->cid ?>" class="wp-block-zibllblock-postsbox">
	<div class="article-postsbox relative-h radius8" style="margin-left: 0;">
		<div class="abs-blur-bg"><img referrerpolicy="no-referrer" rel="noreferrer" decoding="async" data-thumb="default" src="<?= joe_lazyload_url() ?>" data-src="<?= joe_article_thumbnails_url($article)[0] ?>" alt="<?= $article->title ?>-<?= $options->title ?>" class="lazyload fit-cover radius8 no-imgbox"></div>
		<div class="posts-mini posts-item relative">
			<div class="mr10"><div class="item-thumbnail"><a href="<?= joe_relative_url($article->permalink) ?>"><img referrerpolicy="no-referrer" rel="noreferrer" decoding="async" data-thumb="default" src="<?= joe_lazyload_url() ?>" data-src="<?= joe_article_thumbnails_url($article)[0] ?>" alt="<?= $article->title ?>-<?= $options->title ?>" class="lazyload fit-cover radius8 no-imgbox"></a></div></div>
			<div class="posts-mini-con flex xx flex1 jsb">
				<div class="item-heading text-ellipsis-2 main-color"><a class="main-color" href="<?= joe_relative_url($article->permalink) ?>"><?= $article->title ?></a></div>
				<div class="item-meta muted-2-color flex jsb ac">
					<item class="meta-author flex ac"><a href="<?= joe_relative_url($article->author->permalink) ?>"><span class="avatar-mini"><img referrerpolicy="no-referrer" rel="noreferrer" decoding="async" alt="<?= $article->author->screenName ?>的头像-<?= $options->title ?>" src="<?= joe_avatar_lazyload_url() ?>" data-src="<?= joe_avatar_url_by_mail($article->author->mail) ?>" class="lazyload avatar avatar-id-<?= $article->author->uid ?>"></span></a><span title="<?= $article->date->format($options->postDateFormat) ?>" class="ml6"><?= joe_date_word($article->dateWord) ?></span></item>
					<div class="meta-right">
						<item class="meta-comm"><a rel="nofollow" data-toggle="tooltip" title="去评论" href="<?= joe_relative_url($article->permalink) ?>#comments"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg><?= intval($article->commentsNum) ?></a></item>
						<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg><?= number_format($article->views) ?></item>
						<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><?= number_format($article->agree) ?></item>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>