<?php

use think\facade\DbLog;

$path_info = $self->request->getPathInfo();
$path_info_explode = explode('/', $path_info);

/* 主题开放API 路由规则 */
if (str_starts_with($path_info, '/joe/api')) {
    $self->response->setStatus(200);
    $route = empty($path_info_explode[3]) ? $self->request->action : $path_info_explode[3];
    if ($route && !is_numeric($route)) {
        if (str_ends_with($route, '.json')) $route = substr($route, 0, -5);
        $method = think\helper\Str::camel($route);
        require_once JOE_ROOT . 'public/api.php';
        $method_exists = method_exists(JoeApi::class, $method);
        if (!$method_exists) $self->response->throwJson(['code' => 404, 'message' => '接口 [' . $route . '] 不存在']);
        JoeApi::$self = $self;
        JoeApi::$options = Helper::options();
        JoeApi::$user = joe_user_alloc();
        $api = JoeApi::$method($self);
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
            $self->response->throwJson($api);
        }
        if (is_string($api)) $self->response->throwContent($api);
        if ($api === true) $self->response->throwContent('');
    } else {
        $self->response->throwJson(['code' => 404, 'message' => '未调用接口']);
    }
}

if (str_starts_with($path_info, '/create')) {
    $self->response->setStatus(200);
    $self->setThemeFile('create.php');
}

if (str_starts_with($path_info, '/goto') && Helper::options()->joe_external_link_redirect == 'on') {
    (function () use ($self) {
        $self->response->setStatus(200);
        $url = empty($self->request->url) ? '' : $self->request->url;
        $url = base64_decode($url);
        if (!preg_match('/^https?:\/\/[^\s]*/i', $url)) {
            $self->response->throwContent('<script>alert("链接非法，已返回");window.location.href="' . Helper::options()->siteUrl . '"</script>');
        }
        $self->setArchiveType('page');
        $self->setArchiveSlug('goto');
        $self->setThemeFile('module/goto.php');
    })();
}

// 增加自定义登录页面
if (Helper::options()->JUser_Switch == 'on' && str_starts_with($path_info, '/user/auth')) {
    if (joe_user_alloc()->hasLogin()) {
        $redirect_to = empty($self->request->redirect_to) ? '/' : urldecode($self->request->redirect_to);
        $self->response->setStatus(301);
        $self->response->setHeader('location', $redirect_to);
        $self->response->respond();
    }
    $self->response->setStatus(200);
    $self->setThemeFile('module/user/auth.php');
}

/* 增加自定义SiteMap功能 */
if (Helper::options()->JSiteMap && Helper::options()->JSiteMap !== 'off') {
    if (str_starts_with($self->request->getRequestUri(), '/sitemap.xml')) {
        $self->response->setStatus(200);
        $self->setThemeFile("module/sitemap.php");
    }
}
