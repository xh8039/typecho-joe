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

$name = $this->getArchiveType();
if (in_array($name, (array) $this->options->joe_sidebar)) {
	echo '<div class="sidebar">';
	if (in_array($name, (array) $this->options->joe_sidebar_user)) $this->need('module/sidebar/user.php');
	if ($this->is('post')) {
		if ($this->options->joe_article_content_nav === 'on') $this->need('module/sidebar/nav.php');
		if ($this->fields->hide == 'pay') $this->need('module/sidebar/pay.php');
	}
	if (in_array($name, (array) $this->options->joe_sidebar_hot_post)) $this->need('module/sidebar/hot.php');
	if (in_array($name, (array) $this->options->joe_sidebar_new_comment)) $this->need('module/sidebar/comment.php');
	if (in_array($name, (array) $this->options->joe_sidebar_tag_list)) $this->need('module/sidebar/tag.php');
	if (in_array($name, (array) $this->options->joe_sidebar_motto)) $this->need('module/sidebar/motto.php');
	// $this->need('module/sidebar/yiyan.php');
	if (in_array($name, (array) $this->options->joe_sidebar_custom_html)) echo $this->options->joe_sidebar_html;
	echo '</div>';
}
