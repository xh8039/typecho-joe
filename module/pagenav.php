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

ob_start(); // 开始输出缓冲
$this->pageNav('<i class="fa fa-angle-left em12"></i><span class="hide-sm ml6">上一页</span>', '<span class="hide-sm mr6">下一页</span><i class="fa fa-angle-right em12"></i>', 1, '...', [
	'wrapTag' => 'div',
	'wrapClass' => 'pagenav ajax-pag',
	'itemTag' => '',
	'textTag' => 'a',
	'textClass' => 'page-numbers',
	'currentClass' => 'current',
	'prevClass' => 'prev',
	'nextClass' => 'next ajax-next'
]);
$html = ob_get_contents(); // 获取缓冲区的内容并存储到变量中
ob_end_clean(); // 清空缓冲区并关闭输出缓冲

// $link = element('a')->class('page-numbers');
// if ($orderby = $this->request->get('orderby')) {
// 	$link->attr('href','$1?orderby=' . $orderby);
// } else {
// 	$link->attr('href','$1');
// }
// $html = preg_replace('/<a href="([^"]+)">(.*?)<\/a>/', $link->get('$2'), $html);

if ($orderby = $this->request->get('orderby')) {
    $html = preg_replace('/<a href="([^"]+)"/', '<a href="$1?orderby=' . $orderby . '"', $html);
}
echo $html;