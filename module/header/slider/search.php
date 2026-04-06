<div class="header-slider-search abs-center">
	<div class="header-slider-search-more text-center before"><?= $this->options->joe_header_slider_search_option_before_html ?></div>
	<div class="search-input">
		<form method="get" class="padding-10 search-form" action="/">
			<div class="line-form">
				<div class="search-input-text">
					<input type="text" name="s" class="line-form-input" tabindex="1" value="">
					<i class="line-form-line"></i>
					<div class="scale-placeholder" default="开启精彩搜索">开启精彩搜索</div>
					<div class="abs-right muted-color">
						<button type="submit" tabindex="2" class="null">
							<svg class="icon" aria-hidden="true">
								<use xlink:href="#icon-search"></use>
							</svg>
						</button>
					</div>
				</div>
				<input type="hidden" name="type" value="post">
			</div>
		</form>
		<?php
		if (joe_is_pc() && $this->options->joe_header_slider_search_option_popular_limit) {
			$tags = Widget\Metas\Tag\Cloud::alloc(['sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => $this->options->joe_header_slider_search_option_popular_limit]);
			if ($tags->have()) {
		?>
				<div class="search-keywords">
					<p class="muted-color">
						<span>热门搜索</span>
						<a data-class="modal-mini" mobile-bottom="true" data-height="243" data-remote="<?= joe_api_url('search_keywords_edit_modal', ['type' => 'term']) ?>" class="pull-right muted-3-color" href="javascript:;" data-toggle="RefreshModal">
							<i data-toggle="tooltip" title="编辑搜索关键词" class="fa em12 fa-edit"></i>
						</a>
					</p>
					<div>
						<?php
						while ($tags->next()) {
						?>
							<a class="search_keywords muted-2-color but em09 mr6 mb6" href="<?= joe_relative_url($tags->permalink) ?>"><?= $tags->name ?></a>
						<?php
						}
						?>
					</div>
				</div>
		<?php
			}
		}
		?>
	</div>
	<div class="header-slider-search-more after"><?= $this->options->joe_header_slider_search_option_after_html ?></div>
</div>