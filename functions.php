<?php

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

// if (!empty(Helper::options()->JCustomFunctionsCode)) {
// 	file_put_contents(JOE_ROOT . 'JCustomFunctionsCode.php', Helper::options()->JCustomFunctionsCode);
// 	include_once JOE_ROOT . 'JCustomFunctionsCode.php';
// 	unlink(JOE_ROOT . 'JCustomFunctionsCode.php');
// }
