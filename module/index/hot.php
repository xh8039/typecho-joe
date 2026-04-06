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

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
if (joe_is_mobile()) $this->options->JIndexHotArticleNumber = $this->options->JIndexMobileHotArticleNumber;
if (!is_numeric($this->options->JIndexHotArticleNumber) || $this->options->JIndexHotArticleNumber < 1) return;
$this->widget('Widget_Contents_Hot@Index', 'action=index&pageSize=' . intval($this->options->JIndexHotArticleNumber))->to($item); ?>
<div class="widget-main-post mb20 style-card">
	<div class="box-body notop">
		<div class="title-theme">热门文章</div>
	</div>
	<div class="widget-ajaxpager">
		<?php while ($item->next()) echo joe_article_item($item); ?>
	</div>
</div>