<div class="posts-row ajaxpager">
	<div class="ajax-option ajax-replace" win-ajax-replace="filter">
		<div class="flex ac">
			<div class="option-dropdown splitters-this-r dropdown flex0">排序</div>
			<ul class="list-inline scroll-x mini-scrollbar option-items">
				<?= joe_article_list_order_html() ?>
				<!-- <a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?cat=4&#038;orderby=modified">更新</a>
				<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?cat=4&#038;orderby=views">浏览</a>
				<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?cat=4&#038;orderby=like">点赞</a>
				<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?cat=4&#038;orderby=comment_count">评论</a> -->
			</ul>
		</div>
	</div>
	<div></div>
	<?php
	if ($this->have()) {
		while ($article = $this->next()) echo joe_article_item($this, ['category' => false]);
	} else {
	?>
		<div class="text-center ajax-item" style="padding:100px 0;">
			<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null-post.svg') ?>">
			<p style="margin-top:100px;" class="em09 muted-3-color separator">暂无内容</p>
		</div>
	<?php
	}
	$this->need('module/pagenav.php') ?>
</div>