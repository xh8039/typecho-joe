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

$joe_category_default_cover = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_category_default_cover',
	NULL,
	'/usr/themes/' . JOE_THEME_NAME . '/assets/img/user_t.jpg',
	'分类页面 - 封面图',
	'默认封面图，建议尺寸2000x800，不填写则不显示封面图'
);
$joe_category_default_cover->setAttribute('class', 'joe_content joe_page');
$form->addInput($joe_category_default_cover);
