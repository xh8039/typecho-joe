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
?>
<ul class="breadcrumb"><li><a href="/"><i class="fa fa-map-marker"></i> 首页</a></li><?php if (sizeof($this->categories) > 0) : ?><li><a href="<?= joe_relative_url($this->categories[0]['permalink']); ?>"><?= $this->categories[0]['name']; ?></a></li><?php endif; ?><li>正文</li></ul>