<div class="theme-box">
	<div class="box-body notop">
		<div class="title-theme">最近评论</div>
	</div>
	<div class="box-body comment-mini-lists zib-widget">
		<?php
		$this->widget('Widget\Comments\Recent', 'ignoreAuthor=true&pageSize=5')->to($item);
		while ($item->next()) {
			?>
			<div class="posts-mini">
			<span class="avatar-img">
				<img alt="头像" src="<?= joe_avatar_lazyload_url(); ?>" data-src="<?= joe_get_avatar_by_mail($item->mail) ?>" class="lazyload avatar avatar-id-0">
			</span>
			<div class="posts-mini-con em09 ml10 flex xx jsb">
				<p class="flex jsb">
					<span class="flex1 flex">
						<?php $item->author(false) ?><span class="flex0 icon-spot muted-3-color" title="<?php $item->date('Y-m-d H:i:s'); ?>"><?= joe_dateWord($item->dateWord) ?></span>
					</span>
					<!-- <span class="ml10 flex0"><a href="javascript:;" data-action="comment_like" class="action action-comment-like pull-right muted-2-color" data-pid="1"><svg class="icon mr3" aria-hidden="true"><use xlink:href="#icon-like"></use></svg><text></text><count>0</count></a></span> -->
				</p>
				<a class="muted-color text-ellipsis-5" href="<?= joe_root_relative_link($item->permalink) ?>"><?= strip_tags($item->content) ?></a>
			</div>
			</div>
			<?php
		}
		?>
	</div>
</div>