<div class="search-input">
	<form method="get" class="padding-10 search-form" action="/">
		<div class="line-form">
			<!-- <div class="option-dropdown splitters-this-r search-drop"><div class="dropdown"><a href="javascript:;" class="padding-h10" data-toggle="dropdown"><span name="type">文章</span><i class="fa ml6 fa-sort opacity5" aria-hidden="true"></i></a><ul class="dropdown-menu"><li><a href="javascript:;" class="text-ellipsis" data-for="type" data-value="post">文章</a></li><li><a href="javascript:;" class="text-ellipsis" data-for="type" data-value="user">用户</a></li></ul></div></div> -->
			<div class="search-input-text">
				<input type="text" name="s" class="line-form-input" tabindex="1" value="">
				<i class="line-form-line"></i>
				<div class="scale-placeholder" default="开启精彩搜索">开启精彩搜索</div>
				<div class="abs-right muted-color"><button type="submit" tabindex="2" class="null"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-search"></use></svg></button></div>
			</div>
			<!-- <input type="hidden" name="type" value="post"> -->
		</div>
	</form>
	<?php
	$history_search = joe_history_search();
	if (!empty($history_search) && is_array($history_search)) {
		joe_history_search_render($history_search);
	} else {
		echo '<div class="padding-10 relates relates-thumb"></div>';
	}
	?>
</div>