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

$selectors = $this->request->getHeader('x-ajax-selectors');
if (is_string($selectors)) {
	$selectors = json_decode($selectors, true);
	if (in_array('#comment_module>.comment-list', $selectors)) $this->need('module/single/comment.php');
	if (in_array('.joe_detail__leaving', $selectors)) $this->need('module/single/leaving.php');
	if (in_array('.joe_detail__article', $selectors)) $this->need('module/single/article.php');
	if (!in_array('#Joe', $selectors)) exit(0);
}
if ($this->is('single') && strpos($this->request->getPathInfo(), '/comment-page-1') !== false) {
	$this->response->setStatus(302);
	$url = str_ireplace('/comment-page-1', '', $this->request->getRequestUrl());
	$this->response->redirect($url, true);
	exit(0);
}
if ($this->is('post') && (joe_detect_spider() || joe_spider_referer()) && isset($_GET['scroll'])) {
	$this->response->setStatus(301);
	$url = str_ireplace('scroll=' . $_GET['scroll'], '', $this->request->getRequestUrl());
	$url = trim($url, '?');
	$url = str_replace(['??', '?&', '&&'], ['?', '?', '&'], $url);
	$this->response->redirect($url, true);
	exit(0);
}
