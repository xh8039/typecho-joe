<div class="ajax-item-header type-post">
	<div class="search-desc-text mb10 mt10 muted-2-color">搜索 <a href="<?= $url ?>"><b class="search-key focus-color"><?= $this->getKeywords() ?></b></a>，共找到 <b class="focus-color"><?= $this->getTotal() ?> </b>个文章</div>
	<div class="search-tab-header zib-widget relative padding-h10">
		<div class="search-tab-filter">
			<div class="flex ac mini-scrollbar scroll-x search-filter-item search-filter-orderby">
				<span class="opacity5">排序</span>
				<?php
				$order_list = ['created' => '最新', 'views' => '热门', 'like' => '点赞', 'comment_count' => '评论', 'favorite' => '收藏', 'sales_volume' => '销量'];
				foreach ($order_list as $order_name => $order_title) {
					$order_link = element('a')->attr(['rel' => 'nofollow', 'ajax-replace' => 'true', 'href' => $url . '?orderby=' . $order_name])->class('muted-color ajax-next');
					if ($order_name == Typecho\Request::getInstance()->get('orderby', 'created')) {
						$order_link->innerHTML(element('span')->class('focus-color')->get($order_title));
					} else {
						$order_link->innerText($order_title);
					}
					echo $order_link;
				}
				?>
				<!-- <a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=created">最新</a>
				<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=views">热门</a>
				<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=like">点赞</a>
				<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=comment_count">评论</a>
				<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=favorite">收藏</a>
				<a rel="nofollow" ajax-replace="true" class="muted-color ajax-next" href="<?= $url ?>?orderby=sales_volume">销量</a> -->
			</div>
		</div>
	</div>
</div>