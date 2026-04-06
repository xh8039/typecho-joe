<?php $url = Typecho\Router::url('search', ['keywords' => urlencode($this->getKeywords())], $this->options->index); ?>
<div class="ajaxpager search-page-ajaxpager">
	<?php
	require $this->themeDir . 'module/archive/search/header.php';
	if ($this->have()) {
		while ($this->next()) echo joe_article_item($this);
	} else {
	?>
		<div class="text-center ajax-item" style="padding:100px 0;">
			<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null-post.svg') ?>">
			<p style="margin-top:100px;" class="em09 muted-3-color separator">暂无内容</p>
		</div>
		<div class="ajax-pag hide">
			<div class="next-page ajax-next"><a href="#"></a></div>
		</div>
	<?php
	}
	$this->need('module/pagenav.php')
	?>
	<div class="post_ajax_loader search-loader" style="display: none;">
		<div class="mb20">
			<div class="text-center muted-2-color mt20">
				<i class="loading mr10"></i>
				加载中...
			</div>
		</div>
	</div>
</div>