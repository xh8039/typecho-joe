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
'<meta name="renderer" content="webkit" />';
$theme_color = ['dark-theme' => '#2F3135', 'white-theme' => '#FDFCFE'];
?>
<meta charset="UTF-8" />
<link rel="dns-prefetch" href="//apps.bdimg.com">
<meta name="theme-color" content="<?= $theme_color[joe_theme_mode()] ?? '' ?>">
<meta name="format-detection" content="email=no" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="apple-touch-icon" href="<?= empty($this->options->joe_manifest_icon) ? $this->options->joe_favicon : $this->options->joe_manifest_icon ?>">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name='apple-mobile-web-app-title' content='<?php $this->options->title() ?>'>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="manifest" href="<?= joe_api_url('manifest.json') ?>" />
<?php
if ($this->is('post')) {
	$image =  empty(joe_article_thumbnail_url($this)) ? $this->options->joe_favicon : joe_article_thumbnail_url($this)[0];
} else {
	$image = $this->options->joe_favicon;
}
?>
<meta itemprop="image" content="<?= $image ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimum-scale=1.0,maximum-scale=1.0,viewport-fit=cover">
<link rel="shortcut icon" href="<?php $this->options->joe_favicon() ?>" />
<link rel="icon" href="<?php $this->options->joe_favicon() ?>" />
<link rel="msapplication-TileImage" href="<?php $this->options->joe_favicon() ?>" />
<title><?php $this->archiveTitle(array('category' => '分类 %s 下的文章', 'search' => '包含关键字 %s 的文章', 'tag' => '标签 %s 下的文章', 'author' => '用户 %s 的主页'), '', ' - '); ?><?php if ($this->_currentPage > 1) echo '第 ' . $this->_currentPage . ' 页 - '; ?><?php $this->options->title(); ?></title>
<?php if ($this->is('single')) { ?>
	<meta name="keywords" content="<?= $this->fields->keywords ? $this->fields->keywords : $this->keywords; ?>" />
	<meta name="descdeription" content="<?= $this->fields->description ? $this->fields->description : joe_article_description($this); ?>" />
<?php
	$this->header('keywords=&description=&commentReply=&antiSpam=');
} else {
	$this->header('commentReply=&antiSpam=');
}
?>

<link rel="stylesheet" id='_bootstrap-css' href="<?= joe_theme_url('assets/css/bootstrap.min.css') ?>" type='text/css' media='all' />
<link rel="stylesheet" id='_fontawesome-css' href="<?= joe_theme_url('assets/css/font-awesome.min.css') ?>" type='text/css' media='all' />
<link rel="stylesheet" id='_main-css' href="<?= joe_theme_url('assets/css/main.min.css') ?>" type='text/css' media='all' />
<link rel="stylesheet" id='_global-css' href="<?= joe_theme_url('assets/css/global.css') ?>" type='text/css' media='all' />
<?= $this->is('single') ? element('link')->attr(['rel'=>'stylesheet','id'=>'_article-css','href'=>joe_theme_url('assets/css/article.css'),'type'=>'text/css'])->get() : '' ?>
<script type="text/javascript" src="<?= joe_theme_url('assets/plugin/yihang/ThemeManager.js') ?>"></script>
<script type="text/javascript" src="<?= joe_theme_url('assets/js/libs/jquery.min.js') ?>" id="jquery-js"></script>
<?php $this->need('module/config.php'); ?>

<!-- 自定义头部HTML代码 -->

<?php $this->options->JCustomHeadEnd() ?>

<!-- 自定义头部HTML代码 -->
<!--[if IE]><script src="<?= joe_theme_url('assets/js/libs/html5.min.js') ?>"></script><![endif]-->