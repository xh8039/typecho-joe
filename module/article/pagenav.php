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
$thePrev = joe_thePrev($this);
$theNext = joe_theNext($this);
if ($thePrev || $theNext) {
?>
	<div class="theme-box" style="height:99px">
		<nav class="article-nav">
			<div class="main-bg box-body radius8 main-shadow">
				<a href="<?= $thePrev ? joe_relative_url($thePrev['permalink']) : 'javascript:;' ?>">
					<p class="muted-2-color"><i class="fa fa-angle-left em12"></i><i class="fa fa-angle-left em12 mr6"></i>上一篇</p>
					<div class="text-ellipsis-2"><?= $thePrev ? $thePrev['title'] : '无更多文章' ?></div>
				</a>
			</div>
			<div class="main-bg box-body radius8 main-shadow">
				<a href="<?= $theNext ? joe_relative_url($theNext['permalink']) : 'javascript:;' ?>">
					<p class="muted-2-color">下一篇<i class="fa fa-angle-right em12 ml6"></i><i class="fa fa-angle-right em12"></i></p>
					<div class="text-ellipsis-2"><?= $theNext ? $theNext['title'] : '无更多文章' ?></div>
				</a>
			</div>
		</nav>
	</div>
<?php
}
