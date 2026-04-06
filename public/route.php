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

use think\facade\DbLog;

$routingTable = Helper::options()->routingTable; // 获取路由表
$path_info = $archive->request->getPathInfo();
$routes = [
	[
		'name' => 'user',
		'path' => '/user/[action]',
		'callable' => function () use ($archive) {
			$archive->parameter->checkPermalink = false; // 🔥 核心：源码级修复 -> 关闭 permalink 检查（阻止301重定向）
			$archive->setFetchSql(null); // 禁用默认文章查询
			$action = $archive->request->get('action');
			if ($action == 'auth') {
				if (!Helper::options()->JUser_Switch) return;
				if (joe_user_alloc()->hasLogin()) {
					$archive->response->setStatus(301);
					$redirect_to = $archive->request->get('redirect_to', '/');
					$archive->response->setHeader('location', $redirect_to);
					Typecho\Response::getInstance()->respond();
				}
				$archive->response->setStatus(200);
				$archive->setArchiveType('single');
				$archive->setArchiveSlug('user/auth');
			} else {
				if (!joe_user_alloc()->hasLogin()) {
					$redirect_to = $archive->request->get('redirect_to', $archive->request->getReferer()) ?: '/user/index';
					$archive->response->setStatus(301);
					$archive->response->setHeader('location', joe_user_auth_url('login', $redirect_to));
					Typecho\Response::getInstance()->respond();
				}
				$archive->response->setStatus(200);
				$archive->setArchiveTitle(joe_user_alloc()->screenName . '的用户中心');
				$archive->setArchiveType('single');
				$archive->setArchiveSlug('user/index');
				// $archive->setThemeFile('module/user/dashboard/index.php');
			}
		}
	],
	[
		'name' => 'create',
		'path' => '/create',
		'callable' => function () use ($archive) {
			$archive->setFetchSql(null); // 禁用默认文章查询
			$archive->response->setStatus(200);
			$archive->setThemeFile('create.php');
		}
	],
	[
		'name' => 'goto',
		'path' => '/goto',
		'callable' => function () use ($archive) {
			if (!Helper::options()->joe_external_link_redirect) return;
			$archive->setFetchSql(null); // 禁用默认文章查询
			$archive->response->setStatus(200);
			$url = empty($archive->request->url) ? '' : $archive->request->url;
			$url = base64_decode($url);
			if (!preg_match('/^https?:\/\/[^\s]*/i', $url)) {
				$archive->response->throwContent('<script>alert("链接非法，已返回");window.location.href="/"</script>');
			}
			$archive->setArchiveType('single');
			$archive->setArchiveSlug('goto');
		}
	],
	[
		'name' => 'sitemap',
		'path' => '/sitemap.xml',
		'callable' => function () use ($archive) {
			if (Helper::options()->JSiteMap == 'off') return;
			$archive->setFetchSql(null); // 禁用默认文章查询
			$archive->response->setStatus(200);
			$archive->setArchiveType('single');
			$archive->setArchiveSlug('sitemap');
			// $archive->setThemeFile("module/sitemap.php");
		}
	]
];
foreach ($routes as $route) {
	if (!array_key_exists($route['name'], $routingTable)) {
		Helper::addRoute($route['name'], $route['path'], 'Widget_Archive', 'render');
	}
	if (!isset(Typecho\Router::$current)) continue;
	if (Typecho\Router::$current == $route['name']) $route['callable']();
	// if ($archive->parameter->type == $route['name']) $route['callable']();
}


if (str_starts_with($path_info, '/joe/api')) {
	$archive->response->setStatus(200);
	$path_info_explode = explode('/', $path_info);
	$route = empty($path_info_explode[3]) ? $archive->request->action : $path_info_explode[3];
	if ($route && !is_numeric($route)) {
		if (str_ends_with($route, '.json')) $route = substr($route, 0, -5);
		$method = think\helper\Str::camel($route);
		require_once JOE_ROOT . 'public/api.php';
		$method_exists = method_exists(JoeApi::class, $method);
		if (!$method_exists) $archive->response->throwJson(['error' => 1, 'message' => '接口 [' . $route . '] 不存在', 'msg' => '接口 [' . $route . '] 不存在']);
		JoeApi::$archive = $archive;
		JoeApi::$options = Helper::options();
		JoeApi::$user = joe_user_alloc();
		JoeApi::$request = $archive->request;
		$api = JoeApi::$method($archive);
		if (is_array($api) || is_object($api)) {
			if (Helper::options()->JoeDeBug == 'on') {
				if (is_array($api)) {
					if (array_is_list($api)) {
						$api[array_key_last($api)]['fetchSql'] = DbLog::list();
					} else {
						$api['fetchSql'] = DbLog::list();
					}
				}
				if (is_object($api)) $api->fetchSql = DbLog::list();
			}
			$archive->response->throwJson($api);
		}
		if (is_string($api)) $archive->response->throwContent($api);
		if ($api === true) $archive->response->throwContent('');
	} else {
		$archive->response->throwJson(['error' => 1, 'message' => '未调用接口', 'msg' => '未调用接口']);
	}
}
