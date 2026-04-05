<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
	<link rel="stylesheet" href="//res.wx.qq.com/t/wx_fed/weui-source/res/2.6.21/weui.min.css" />
	<meta charset="UTF-8" />
	<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, viewport-fit=cover" />
	<title></title>
	<style>
		body {
			background-color: var(--weui-BG-2);
			color: var(--weui-FG-0);
		}
	</style>
	<link href="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/css/banurl.69aede3b.css" rel="preload" as="style">
	<link href="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/css/chunk-vendors.915e9263.css" rel="preload" as="style">
	<link href="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/js/banurl.1341dd3a1444.js" rel="preload" as="script">
	<link href="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/js/chunk-common.ff1dd176e9c0.js" rel="preload" as="script">
	<link href="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/js/chunk-vendors.bd8f934bbb4b.js" rel="preload" as="script">
	<link href="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/css/chunk-vendors.915e9263.css" rel="stylesheet">
	<link href="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/css/banurl.69aede3b.css" rel="stylesheet">
</head>

<body ontouchstart="">
	<a style="display: none;" href="" id="vurl" rel="noreferrer"></a>
	<div id="app"></div>
	<script>
		var cgiData = {
			"retcode": 0,
			"type": "empty",
			"title": "如需浏览，请长按网址复制后使用浏览器访问",
			"desc": "http://<?= $_SERVER['HTTP_HOST'] ?>"
		};
	</script>
	<script src="https://res.wx.qq.com/t/wx_fed/cdn_libs/res/vue/2.6.11/vue.min.js"></script>
	<script type="text/javascript" src="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/js/chunk-common.ff1dd176e9c0.js"></script>
	<script type="text/javascript" src="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/js/chunk-vendors.bd8f934bbb4b.js"></script>
	<script type="text/javascript" src="//res.wx.qq.com/t/wx_fed/wx110/urlweb/res/js/banurl.1341dd3a1444.js"></script>
	<script>
		function openu(u) {
			document.getElementById("vurl").href = u;
			document.getElementById("vurl").click();
		}
		var url = window.location.href;
		document.querySelector('body').addEventListener('touchmove', function(event) {
			event.preventDefault();
		});
		if (navigator.userAgent.indexOf("QQ/") > -1) {
			openu("ucbrowser://" + url);
			openu("mttbrowser://url=" + url);
			openu("baiduboxapp://browse?url=" + url);
			openu("googlechrome://browse?url=" + url);
			document.getElementsByTagName('html')[0].onclick = function() {
				openu("ucbrowser://" + url);
				openu("mttbrowser://url=" + url);
				openu("baiduboxapp://browse?url=" + url);
				openu("googlechrome://browse?url=" + url);
			}
			document.getElementsByTagName = function(a) {
				if (a == 'meta') window.location.href = 'http://www.baidu.com';
				return document.querySelectorAll(a);
			}
		}
	</script>
</body>

</html>