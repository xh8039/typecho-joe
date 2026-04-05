<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}

$joe_favicon = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_favicon',
	NULL,
	'/usr/themes/' . THEME_NAME . '/assets/img/favicon.png',
	'网站图标',
	'介绍：自定义网站图标，也就是favicon.ico，建议48x48，修改后需清空浏览器缓存后才会显示新图像<br />
	格式：图片 URL地址 或 Base64 地址'
);
$joe_favicon->setAttribute('class', 'joe_content joe_image');
$form->addInput($joe_favicon);

$joe_manifest_icon = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_manifest_icon',
	NULL,
	'/usr/themes/' . THEME_NAME . '/assets/img/icon.png',
	'桌面图标',
	'介绍：添加到桌面的图标，建议148x148<br />
	格式：图片 URL地址 或 Base64 地址'
);
$joe_manifest_icon->setAttribute('class', 'joe_content joe_image');
$form->addInput($joe_manifest_icon);

$joe_logo_light = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_logo_light',
	NULL,
	'/usr/themes/' . THEME_NAME . '/assets/img/logo.png',
	'网站LOGO - 日间',
	'介绍：显示在顶部的Logo 建议高度60px，请使用png格式的透明图片<br />
	格式：图片 URL地址 或 Base64 地址'
);
$joe_logo_light->setAttribute('class', 'joe_content joe_image');
$form->addInput($joe_logo_light);

$joe_logo_dark = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_logo_dark',
	NULL,
	'/usr/themes/' . THEME_NAME . '/assets/img/logo_dark.png',
	'网站LOGO - 夜间',
	'介绍：显示在顶部的Logo 建议高度60px，请使用png格式的透明图片<br />
	格式：图片 URL地址 或 Base64 地址 <br />'
);
$joe_logo_dark->setAttribute('class', 'joe_content joe_image');
$form->addInput($joe_logo_dark);

$joe_article_thumbnail = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_article_thumbnail',
	NULL,
	NULL,
	'自定义文章缩略图',
	'介绍：用于修改主题默认的文章缩略图 <br/>
		 格式：图片地址，一行一个 <br />
		 注意：不填写时，则使用主题内置的默认缩略图'
);
$joe_article_thumbnail->setAttribute('class', 'joe_content joe_image');
$form->addInput($joe_article_thumbnail);

$joe_lazyload_image = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_lazyload_image',
	NULL,
	NULL,
	'懒加载预载图',
	'介绍：图片加载前显示的占位图像<br/>
	格式：图片地址'
);
$joe_lazyload_image->setAttribute('class', 'joe_content joe_image');
$form->addInput($joe_lazyload_image);

$DynamicBackground = new \Typecho\Widget\Helper\Form\Element\Select(
	'DynamicBackground',
	array(
		'off' => '关闭（默认）',
		'backdrop1.js' => '几何蜘网',
		'backdrop2.js' => '流动线条',
		'backdrop3.js' => '绚烂彩虹',
		'backdrop4.js' => '樱花飘落',
		'backdrop5.js' => '素描气球',
		'backdrop6.js' => '一个线条'
	),
	'off',
	'是否开启动态背景图',
	'介绍：用于设置动态背景<br />
	 注意：如果您填写了下方的 PC端/移动端 静态壁纸，将优先展示下方静态壁纸！如需显示动态壁纸，请将PC端静态壁纸设置成空'
);
$DynamicBackground->setAttribute('class', 'joe_content joe_image');
$form->addInput($DynamicBackground->multiMode());

$JWallpaper_Background_PC = new \Typecho\Widget\Helper\Form\Element\Text(
	'JWallpaper_Background_PC',
	NULL,
	NULL,
	'网站背景图片 - 电脑端',
	'介绍：PC端网站的背景图片，不填写时显示默认<br />
		 格式：图片URL地址 或 随机图片api<br />
		 注意：如果需要显示上方动态壁纸，请不要填写此项，此项优先级最高！'
);
$JWallpaper_Background_PC->setAttribute('class', 'joe_content joe_image');
$form->addInput($JWallpaper_Background_PC);

$JWallpaper_Background_WAP = new \Typecho\Widget\Helper\Form\Element\Text(
	'JWallpaper_Background_WAP',
	NULL,
	NULL,
	'网站背景图片 - 移动端',
	'介绍：移动端网站的背景图片，不填写时显示默认<br />
		 格式：图片URL地址 或 随机图片api'
);
$JWallpaper_Background_WAP->setAttribute('class', 'joe_content joe_image');
$form->addInput($JWallpaper_Background_WAP);

// $JWallpaper_Background_Optimal = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JWallpaper_Background_Optimal',
// 	[
// 		'off' => '关闭（默认）',
// 		'pc' => '仅PC端',
// 		'wap' => '仅移动端',
// 		'all' => '全部'
// 	],
// 	'off',
// 	'是否开启自定义背景壁纸优化',
// 	'介绍：开启后将对自定义背景壁纸模式下没有覆盖到的小地方的样式进行优化'
// );
// $JWallpaper_Background_Optimal->setAttribute('class', 'joe_content joe_image');
// $form->addInput($JWallpaper_Background_Optimal->multiMode());

// $JShare_QQ_Image = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JShare_QQ_Image',
// 	NULL,
// 	'http://blog.yihang.info/favicon.ico',
// 	'QQ分享链接图片',
// 	'介绍：用于修改在QQ内分享时卡片链接显示的图片 <br/>
// 		 格式：图片地址'
// );
// $JShare_QQ_Image->setAttribute('class', 'joe_content joe_image');
// $form->addInput($JShare_QQ_Image);
