<?php
$history_search = joe_history_search($this->getKeywords());
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<?php $this->need('module/head.php'); ?>
</head>

<body class="search search-results <?= joe_body_class('search') ?>">
	<?php $this->need('module/header.php'); ?>
	<main class="container">
		<div class="content-wrap">
			<div class="content-layout">
				<div class="zib-widget" win-ajax-replace="search">
					<div class="search-input main-search page-search-box">
						<form method="get" class="padding-10 search-form" action="<?= $this->options->siteUrl ?>">
							<div class="line-form">
								<div class="search-input-text">
									<input type="text" name="s" class="line-form-input" tabindex="1" value="<?= htmlentities($this->getKeywords()) ?>"><i class="line-form-line"></i>
									<div class="scale-placeholder is-focus" default="开启精彩搜索">开启精彩搜索</div>
									<div class="abs-right muted-color"><button type="submit" tabindex="2" class="null"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-search"></use></svg></button></div>
								</div>
							</div>
						</form>
						<?php joe_history_search_render($history_search); ?>
					</div>
				</div>
				<?php $url = Typecho\Router::url('search', ['keywords' => urlencode($this->getKeywords())], $this->options->index); ?>
				<div class="ajaxpager search-page-ajaxpager">
					<div class="ajax-item-header type-post">
						<div class="search-desc-text mb10 mt10 muted-2-color">搜索 <a href="<?= $url ?>"><b class="search-key focus-color"><?= $this->getKeywords() ?></b></a>，共找到 <b class="focus-color"><?= $this->getTotal() ?> </b>个文章</div>
						<div class="search-tab-header zib-widget relative padding-h10">
							<div class="search-tab-filter">
								<div class="flex ac mini-scrollbar scroll-x search-filter-item search-filter-orderby">
									<span class="opacity5">排序</span>
									<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=date">最新</a>
									<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=views">热门</a>
									<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=like">点赞</a>
									<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=comment_count">评论</a>
									<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=favorite">收藏</a>
									<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=sales_volume">销量</a>
								</div>
							</div>
						</div>
					</div>
					<?php
					if ($this->have()) {
						while ($article = $this->next()) {
							echo joe_article_item($this);
						}
					} else {
					?>
						<div class="text-center ajax-item" style="padding:100px 0;">
							<img style="width:280px;opacity: .7;" src="<?= joe_theme_url('assets/img/null-post.svg') ?>">
							<p style="margin-top:100px;" class="em09 muted-3-color separator">暂无内容</p>
						</div>
						<div class="ajax-pag hide"><div class="next-page ajax-next"><a href="#"></a></div></div>
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
			</div>
		</div>
		<?php $this->need('module/sidebar.php'); ?>
	</main>
	<?php $this->need('module/footer.php') ?>
</body>