<?php

/**
 * 文章列表
 */

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<div class="home-tab-content">
	<div></div>
	<div class="tab-content">
		<div class="posts-row ajaxpager tab-pane fade in active" id="index-tab-main">
			<div class="ajax-option ajax-replace" win-ajax-replace="filter">
				<div class="flex ac">
					<div class="option-dropdown splitters-this-r dropdown flex0">排序</div>
					<ul class="list-inline scroll-x mini-scrollbar option-items">
						<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?orderby=modified">更新</a>
						<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?orderby=views">浏览</a>
						<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?orderby=like">点赞</a>
						<a rel="nofollow" ajax-replace="true" class="ajax-next" href="http://blog.yihang.info/?orderby=comment_count">评论</a>
					</ul>
				</div>
			</div>
			<div></div>
			<?php
			$sticky_text = $this->options->JIndexSticky;
			if (!empty($sticky_text) && $this->getCurrentPage() == 1) {
				$sticky_arr = explode("||", $sticky_text);
				foreach ($sticky_arr as $cid) {
					$cid = trim($cid);
					$item = $this->widget('Widget_Contents_Post@' . $cid, 'cid=' . $cid);
					if ($item->next()) echo joe_article_item($item, ['badge' => '置顶']);
				}
			}
			if ($this->is('index')) $index_hide_categorize_list = joe_optionMulti(Helper::options()->JIndex_Hide_Categorize, '||', false);
			while ($article = $this->next()) {
				if ($this->is('index')) {
					$categorize_slug_list = [];
					foreach ($this->categories as $key => $value) {
						$categorize_slug_list[] = $value['slug'] ? $value['slug'] : $value['name'];
					}
					if (array_intersect($categorize_slug_list, $index_hide_categorize_list)) continue;
				}
				echo joe_article_item($this);
			}
			$this->need('module/pagenav.php');
			?>
		</div>
	</div>
</div>