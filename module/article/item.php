<?php
if ($options->joe_post_list_mode === 'list') $item = '
<posts class="posts-item list ajax-item flex">
	<div class="post-graphic"><div class="item-thumbnail"><a href="' . joe_root_relative_link($article->permalink) . '"><img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" data-thumb="default" src="' . joe_lazyload_url() . '" data-src="' . joe_thumbnails_url($article)[0] . '" alt="' . $article->title . '-' . $options->title . '" class="lazyload fit-cover radius8"></a>' . $args['badge'] . '</div></div>
	<div class="item-body flex xx flex1 jsb">
		<h2 class="item-heading"><a href="' . joe_root_relative_link($article->permalink) . '">' . $article->title . '</a></h2>
		<div class="item-excerpt muted-color text-ellipsis mb6">' . joe_get_abstract($article) . '</div>
		<div>
			<div class="item-tags scroll-x no-scrollbar mb6">' . joe_get_archive_tags($article, $args) . '</div>
			<div class="item-meta muted-2-color flex jsb ac">
				<item class="meta-author flex ac"><a href="' . joe_root_relative_link($article->author->permalink) . '"><span class="avatar-mini"><img alt="' . $article->author->screenName . '的头像-' . $options->title . '" src="' . joe_avatar_lazyload_url() . '" data-src="' . joe_get_avatar_by_mail($article->author->mail) . '" class="lazyload avatar avatar-id-1"></span></a><span class="hide-sm ml6">' . $article->author->screenName . '</span><span title="' . $article->date->format($options->postDateFormat) . '" class="icon-circle">' . joe_dateWord($article->dateWord) . '</span></item>
				<div class="meta-right">
					<item class="meta-comm"><a rel="nofollow" data-toggle="tooltip" title="去评论" href="' . joe_root_relative_link($article->permalink) . '#respond"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg>' . intval($article->commentsNum) . '</a></item>
					<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg>' . number_format($article->views) . '</item>
					<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg>' . number_format($article->agree) . '</item>
				</div>
			</div>
		</div>
	</div>
</posts>';
if ($options->joe_post_list_mode === 'card') $item = '
<posts class="posts-item card ajax-item">
	<div class="item-thumbnail"><a href="' . joe_root_relative_link($article->permalink) . '"><img referrerpolicy="no-referrer" rel="noreferrer" onerror="Joe.thumbnailError(this)" data-thumb="default" src="' . joe_lazyload_url() . '" data-src="' . joe_thumbnails_url($article)[0] . '" alt="' . $article->title . '-' . $options->title . '" class="lazyload fit-cover radius8"></a>' . $args['badge'] . '</div>
	<div class="item-body">
		<h2 class="item-heading"><a href="' . joe_root_relative_link($article->permalink) . '">' . $article->title . '</a></h2>
		<div class="item-tags scroll-x no-scrollbar mb6">' . joe_get_archive_tags($article, $args) . '</div>
		<div class="item-meta muted-2-color flex jsb ac">
			<item class="meta-author flex ac"><a href="' . $article->author->permalink . '"><span class="avatar-mini"><img alt="' . $article->author->screenName . '的头像-' . $options->title . '" src="' . joe_avatar_lazyload_url() . '" data-src="' . joe_get_avatar_by_mail($article->author->mail) . '" class="lazyload avatar avatar-id-' . $article->author->uid . '"></span></a><span title="' . $article->date->format($options->postDateFormat) . '" class="ml6">' . joe_dateWord($article->dateWord) . '</span></item>
			<div class="meta-right">
				<item class="meta-comm"><a rel="nofollow" data-toggle="tooltip" title="去评论" href="' . joe_root_relative_link($article->permalink) . '#respond"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-comment"></use></svg>' . intval($article->commentsNum) . '</a></item>
				<item class="meta-view"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-view"></use></svg>' . number_format($article->views) . '</item>
				<item class="meta-like"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-like"></use></svg>' . number_format($article->agree) . '</item>
			</div>
		</div>
	</div>
</posts>';
