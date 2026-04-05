<div class="search-keywords history-search">
	<p class="muted-color"><span>历史搜索</span><a class="pull-right trash-history-search muted-3-color" href="javascript:;"><i class="fa fa-trash-o em12" aria-hidden="true"></i></a></p>
	<div>
		<?php
		foreach ($history_search as  $value) {
			$url = Typecho\Router::url('search', ['keywords' => urlencode($value)], Helper::options()->index);
			echo '<a class="search_keywords muted-2-color but em09 mr6 mb6" href="' . $url . '">' . htmlentities($value) . '</a>';
		}
		?>
	</div>
</div>