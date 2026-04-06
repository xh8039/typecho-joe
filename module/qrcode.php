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

$text = $_GET['text'] ?? null;
if ($text) {
    Header("Content-type: image/png");
    require_once dirname(__DIR__) . '/system/library/QRcode.php';
    joe\library\QRcode::png($_GET['text'], false, QR_ECLEVEL_L, 10, 1);
} else {
    echo '{"code":2,"msg":"参数不足!"}';
}