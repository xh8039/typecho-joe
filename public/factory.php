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

/* 加强评论拦截功能 */
Typecho\Plugin::factory('Widget\Feedback')->comment = ['joe\typecho\CommentIntercept', 'message'];

/* 邮件通知 */
if (Helper::options()->JCommentMail === 'on' && joe_email_config()) {
	Typecho\Plugin::factory('Widget\Feedback')->finishComment = ['joe\typecho\CommentEmail', 'send'];
}

/* 加强后台编辑器功能 */
if (Helper::options()->JEditor !== 'off') {
	Typecho\Plugin::factory('admin/write-post.php')->richEditor  = ['joe\typecho\Editor', 'Edit'];
	Typecho\Plugin::factory('admin/write-post.php')->option  = ['joe\typecho\Editor', 'labelSelection'];
	Typecho\Plugin::factory('admin/write-page.php')->richEditor  = ['joe\typecho\Editor', 'Edit'];
	Typecho\Plugin::factory('admin/write-page.php')->option  = ['joe\typecho\Editor', 'visibility'];
}

Typecho\Plugin::factory('Widget\Archive')->indexHandle = ['joe\typecho\Archive', 'index'];
Typecho\Plugin::factory('Widget\Archive')->categoryHandle = ['joe\typecho\Archive', 'category'];
Typecho\Plugin::factory('Widget\Archive')->tagHandle = ['joe\typecho\Archive', 'tag'];
Typecho\Plugin::factory('Widget\Archive')->searchHandle = ['joe\typecho\Archive', 'search'];
Typecho\Plugin::factory('Widget\Archive')->authorHandle = ['joe\typecho\Archive', 'author'];
