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

if (!extension_loaded('gd')) die('请安装PHP的GD扩展');
session_start();
require_once dirname(__DIR__) . '/system/library/Captcha.php';
$_vc = new joe\library\Captcha();
$_vc->doimg();
$_SESSION['joe_image_captcha'] = $_vc->getCode();
