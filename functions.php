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

define('JOE_ROOT', dirname(__FILE__) . '/');

if (!function_exists('str_starts_with')) {
	/**
	 * 判断字符串是否以指定字符串开头
	 * @param string $haystack 
	 * @param string $needle 要在 haystack 中搜索的子串。
	 * @return bool
	 */
	function str_starts_with(string $haystack, string $needle): bool
	{
		return $needle !== '' && strncmp($haystack, $needle, strlen($needle)) === 0;
	}
}
if (!function_exists('str_ends_with')) {
	/**
	 * 判断字符串是否以指定字符串结尾
	 * @param string $haystack 
	 * @param string $needle 要在 haystack 中搜索的子串。
	 * @return bool
	 */
	function str_ends_with(string $haystack, string $needle): bool
	{
		return $needle !== '' && substr($haystack, -strlen($needle)) === (string) $needle;
	}
}

if (!function_exists('str_starts_replace')) {
	/**
	 * 替换字符串开头
	 * @param string $search 要被替换的字符串
	 * @param string $replace 替换的字符串
	 * @param string $subject 被替换的字符串
	 * @return string
	 */
	function str_starts_replace(string $search, string $replace, string $subject)
	{
		if (strpos($subject, $search) === 0) { // 检查$search是否在$string开头
			return substr_replace($subject, $replace, 0, strlen($search));
		}
		return $subject; // 如果$search不在开头，则返回原字符串
	}
}

if (!function_exists('array_is_list')) {
	function array_is_list(array $array): bool
	{
		return array_keys($array) === range(0, count($array) - 1);
	}
}

if (!function_exists('getallheaders')) {
	function getallheaders()
	{
		$headers = [];
		foreach ($_SERVER as $key => $value) {
			if (strpos($key, 'HTTP_') === 0) {
				$headerName = str_replace('_', '-', substr($key, 5));
				$headerName = ucwords(strtolower($headerName), '-');
				$headers[$headerName] = $value;
			} elseif (in_array($key, ['CONTENT_TYPE', 'CONTENT_LENGTH'])) {
				$headers[str_replace('_', '-', $key)] = $value;
			}
		}
		return $headers;
	}
}

/* 判断是否是手机 */
function joe_is_mobile()
{
	if (isset($_SERVER['HTTP_X_WAP_PROFILE']))
		return true;
	if (isset($_SERVER['HTTP_VIA'])) {
		return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
	}
	if (isset($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array('nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-', 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu', 'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini', 'operamobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile');
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
			return true;
	}
	if (isset($_SERVER['HTTP_ACCEPT'])) {
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
	return false;
}

function joe_is_pc()
{
	return !joe_is_mobile();
}

function joe_user_alloc()
{
	static $user = null;
	if (!isset($user)) $user = \Widget\User::alloc();
	return $user;
}

function joe_request()
{
	return \Typecho\Request::getInstance();
}

/* 过滤短代码 */
function joe_check_xss($text)
{
	$isXss = false;
	$list = array('/onabort/is', '/onblur/is', '/onchange/is', '/onclick/is', '/ondblclick/is', '/onerror/is', '/onfocus/is', '/onkeydown/is', '/onkeypress/is', '/onkeyup/is', '/onload/is', '/onmousedown/is', '/onmousemove/is', '/onmouseout/is', '/onmouseover/is', '/onmouseup/is', '/onreset/is', '/onresize/is', '/onselect/is', '/onsubmit/is', '/onunload/is', '/eval\(/is', '/ascript:/is', '/style=/is', '/width=/is', '/width:/is', '/height=/is', '/height:/is', '/src=/is');
	if (strip_tags($text)) {
		for ($i = 0; $i < count($list); $i++) {
			if (preg_match($list[$i], $text) > 0) {
				$isXss = true;
				break;
			}
		}
	} else {
		$isXss = true;
	};
	return $isXss;
}

/* Joe核心文件 */
require_once JOE_ROOT . 'public/common.php';

function joe_markdown_hide($content, $post, $login)
{
	joe_check_auth();
	// 如果内容中不存在 {hide} 标签，直接返回原内容
	if (strpos($content, '{hide') === false) return $content;

	// $hide_tag = joe_nested_tag_parse($content);

	if ($post->fields->hide == 'pay') {
		$hide_html = '';
	}

	// 判断是否显示隐藏内容
	$showContent = false;
	if ($post->fields->hide == 'login') {
		$showContent = $login; // 是否登录决定是否显示内容
	} else {
		// 获取用户邮箱地址，登录用户使用全局变量，未登录用户使用文章记住的邮箱
		$user_mail = $login ? joe_user_alloc()->mail : $post->remember('mail', true);
		$comment = null;

		// 如果邮箱不为空 查询评论信息
		if (!empty($user_mail)) $comment = Db::name('comments')->where(['cid' => $post->cid, 'mail' => $user_mail])->find();

		if ($post->fields->hide == 'pay' && $post->fields->price > 0) {
			// 查询支付信息
			$payment = Db::name('orders')->where(function ($query) {
				$query->where('ip', \Typecho\Request::getInstance()->getIp())->whereOr('user_id', JOE_USER_ID);
			})->where(['status' => 1, 'content_cid' => $post->cid])->find();
			$showContent = !empty($payment); // 是否已支付决定是否显示内容
		} else {
			$showContent = !empty($comment); // 是否已评论决定是否显示内容
		}
	}

	if ($showContent) {
		// 只在需要显示内容时移除 {hide} 和 {/hide} 标签
		$content = strtr($content, array("{hide}<br>" => NULL, "<br>{/hide}" => NULL));
		$content = strtr($content, array("{hide}" => NULL, "{/hide}" => NULL));
	} else {
		// 如果隐藏内容没有被显示，保留占位符
		// 隐藏块
		if (strpos($content, '<br>{hide') !== false || strpos($content, '<p>{hide') !== false) {
			$hide_html = '<div data-type="reply" class="wp-block-zibllblock-hide-content"><span><div class="hidden-box" reply-show="true" reload-hash="#hidden-box-comment"><a class="hidden-text" href="javascript:(scrollTopTo(\'#comments\',-50));"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;此处内容已隐藏，请评论后刷新页面查看.</a></div></span></div>';
			$content = preg_replace('/\<br\>{hide[^}]*}([\s\S]*?){\/hide}/', '<br>' . $hide_html, $content);
			$content = preg_replace('/\<p\>{hide[^}]*}([\s\S]*?){\/hide}/', '<p>' . $hide_html, $content);
		}
		// 隐藏行
		$content = preg_replace('/{hide[^}]*}([\s\S]*?){\/hide}/', '<a style="display: inline;padding:0" class="hidden-text" href="javascript:(scrollTopTo(\'#comments\',-50));"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;此处内容已隐藏，请评论后刷新页面查看.</a>', $content);
	}

	// 处理付费内容显示逻辑 非爬虫才显示付费框
	if ($post->fields->hide == 'pay' && !joe_detect_spider()) {
		if ($post->fields->price > 0) {
			$pay_box_position = $showContent ? joe_article_pay_purchased($post, $payment) : joe_article_pay_box($post); // 付费资源
		} else {
			$pay_box_position = joe_article_free_read($post, $comment); // 免费资源
		}

		// 根据设置在顶部或底部显示付费框
		if (!$post->fields->pay_box_position || $post->fields->pay_box_position == 'top') $content = $pay_box_position . $content;
		if ($post->fields->pay_box_position == 'bottom') $content = $content . $pay_box_position;
	}

	return $content;
}
