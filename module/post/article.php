<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<article class="article main-bg theme-box box-body radius8 main-shadow">
	<?php $this->need('module/article/header.php') ?>
	<div class="article-content">
		<div <?= $this->options->joe_article_content_nav === 'on' ? 'data-nav="posts"' : '' ?> class="theme-box wp-posts-content">
			<?php
			if (!joe_detect_spider()) echo $this->options->JArticleHeaderHTML;
			echo joe_parse_content($this);
			if (!joe_detect_spider()) echo $this->options->JArticleBottomHTML;
			?>
		</div>
		<div class="em09 muted-3-color">
			<div><span>©</span>版权声明</div>
			<div class="posts-copyright"><?= $this->options->joe_article_copyright ?></div>
		</div>
		<div class="text-center theme-box muted-3-color box-body separator em09">THE END</div>
		<div class="theme-box article-tags">
			<?php
			$color_list = zibll_color_list();
			foreach ($this->categories as $key => $item) { ?><a class="but ml6 radius <?= $color_list[$key] ?? 'c-blue' ?>" title="查看更多分类文章" href="<?= joe_root_relative_link($item['permalink']) ?>"><i class="fa fa-folder-open-o" aria-hidden="true"></i><?= $item['name'] ?></a><?php } ?>
			<br>
			<?php
			foreach ($this->tags as $key => $value) {
				echo '<a class="but ml6 radius" href="' . $value['permalink'] . '" title="查看此标签更多文章"># ' . $value['name'] . '</a>';
			}
			?>
		</div>
	</div>
	<div class="text-center muted-3-color box-body em09"><?= $this->options->joe_article_action_top_text ?></div>
	<?php $this->need('module/article/actions.php') ?>
</article>