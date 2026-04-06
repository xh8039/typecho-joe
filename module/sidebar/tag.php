<?php
/*
 * @Author        : 易航
 * @Url           : blog.yihang.info
 * @Date          : 2026-03-25 00:00:00
 * @LastEditTime  : 2026-03-27 00:00:00
 * @Email         : 2136118039@qq.com
 * @Project       : Joe主题
 * @Description   : 一款优雅极速的Typecho主题
 * @Read me       : 感谢您使用Joe主题，主题源码有详细的注释，支持二次开发。
 * @Remind        : 使用盗版主题会存在各种未知风险。支持正版，从我做起！
 */

?><div class="theme-box">
	<div class="box-body notop">
		<div class="title-theme">标签云</div>
	</div>
	<div class="zib-widget widget-tag-cloud author-tag">
		<?php
		$tags = \Widget\Metas\Tag\Cloud::allocWithAlias('sidebar_tag_cloud', ['sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 20]);
		while ($tags->next()) {
			$color_class = zibll_rand_color();
			$permalink = joe_relative_url($tags->permalink);
			echo "<a href=\"{$permalink}\" class=\"text-ellipsis but {$color_class}\">{$tags->name}</a>";
		}
		?>
	</div>
</div>