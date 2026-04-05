<div class="theme-box">
	<div class="box-body notop">
		<div class="title-theme">标签云</div>
	</div>
	<div class="zib-widget widget-tag-cloud author-tag">
		<?php
		$this->widget('Widget\Metas\Tag\Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 20))->to($tags);
		while ($tags->next()) {
			$color_class = zibll_rand_color();
			$permalink = joe_root_relative_link($tags->permalink);
			echo "<a href=\"{$permalink}\" class=\"text-ellipsis but {$color_class}\">{$tags->name}</a>";
		}
		?>
	</div>
</div>