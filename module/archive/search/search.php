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
		<?php
		joe_tag_search_render();
		$history_search = joe_history_search($this->getKeywords());
		joe_history_search_render($history_search);
		?>
	</div>
</div>