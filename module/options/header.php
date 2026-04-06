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

$joe_custom_navs_value = "首页 || / || #icon-home-color

文章分类 || #icon-caidanyemian
	源码资源 || /category/code/ || #icon-wangzhanyuanma
	技术教程 || /category/tech/ || #icon-book-color
	程序软件 || /category/program/ || #icon-zhongyaruanjian
	文创娱乐 || /category/infotainment/ || #icon-wallet-color
	公告通知 || /category/notice/ || #icon-guanyu

其他页面 || #icon-tag-color
	友情链接 || /friend.html || #icon-copy-color
	闲聊灌水 || /archives/300.html || fa-comments c-green
	关于我们 || /about.html || #icon-guanyu";
$joe_custom_navs = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_custom_navs',
	NULL,
	$joe_custom_navs_value,
	'自定义导航栏（非必填）',
	'介绍：可随意设置导航链接和导航文字加图标的全新导航栏丨<a target="_blank" href="http://blog.yihang.info/archives/286.html">查看官网教程</a><br>
	示例：<br>' . str_replace(["\n", ' '], ['<br>', '&nbsp;'], $joe_custom_navs_value)
);
$joe_custom_navs->setAttribute('class', 'joe_content joe_header');
$joe_custom_navs->setInputsAttribute('rows', '13');
$form->addInput($joe_custom_navs);


$page = ['index' => '首页', 'category' => '分类', 'tag' => '标签', 'user' => '用户', 'post' => '文章', 'search' => '搜索',  'page' => '单页', 'friend' => '友链'];
$joe_header_slider_show = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_header_slider_show',
	$page,
	['index'],
	'顶部多功能组件',
	'选择启用顶部多功能组件的页面类型，一个都不选则为关闭此功能'
);
$joe_header_slider_show->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_show);

$joe_header_slider_show_type = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_header_slider_show_type',
	['pc' => 'PC端显示', 'mobile' => '移动端显示'],
	['pc', 'mobile'],
	'顶部多功能组件 - 显示规则'
);
$joe_header_slider_show_type->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_show_type);


$joe_header_slider_nav_color = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_header_slider_nav_color',
	NULL,
	NULL,
	'导航栏文字颜色',
	'说明：当开启导航栏固定在顶部后，如果设置的背景图为浅色风格，则默认的白色文字可能会看不清，则推荐设置为黑色<br>
	格式：十六进制颜色代码<br>
	示例：#4e5358'
);
$joe_header_slider_nav_color->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_nav_color);


$joe_header_slider_background = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_header_slider_background',
	NULL,
	"usr/themes/" . JOE_THEME_NAME . "/assets/img/slider-bg.jpg || http://blog.yihang.info\nusr/themes/" . JOE_THEME_NAME . "/assets/img/user_t.jpg || http://blog.yihang.info",
	'顶部多功能组件 - 背景内容',
	'注意：此处如果添加多个背景项目则会以幻灯片(图片轮流切换)的形式展示，当只有一个项目时，则为单个图片或视频背景<br>由于移动端多数浏览器不支持视频背景功能，所以移动端不会显示视频！一行一个，格式：<br>图片/视频URL || 跳转链接 || 叠加文案 || 叠加简介'
);
$joe_header_slider_background->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_background);

$joe_header_slider_option_direction = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_header_slider_option_direction',
	['horizontal' => '左右切换', 'vertical' => '上下切换'],
	'horizontal',
	'顶部多功能组件 - 背景显示 - 幻灯片方向'
);
$joe_header_slider_option_direction->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_direction->multiMode());

$joe_header_slider_option_loop = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_header_slider_option_loop',
	['1' => '开启', '0' => '关闭'],
	'1',
	'顶部多功能组件 - 背景显示 - 循环切换'
);
$joe_header_slider_option_loop->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_loop->multiMode());

$joe_header_slider_option_button = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_header_slider_option_button',
	['1' => '开启', '0' => '关闭'],
	'1',
	'顶部多功能组件 - 背景显示 - 显示翻页按钮'
);
$joe_header_slider_option_button->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_button->multiMode());

$joe_header_slider_option_pagination = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_header_slider_option_pagination',
	['1' => '开启', '0' => '关闭'],
	'1',
	'顶部多功能组件 - 背景显示 - 显示指示器'
);
$joe_header_slider_option_pagination->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_pagination->multiMode());

$joe_header_slider_option_effect = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_header_slider_option_effect',
	['slide' => '滑动', 'fade' => '淡出淡入', 'cube' => '3D方块', 'coverflow' => '3D滑入', 'flip' => '3D翻转'],
	'slide',
	'顶部多功能组件 - 背景显示 - 切换动画'
);
$joe_header_slider_option_effect->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_effect->multiMode());

$joe_header_slider_option_scale_height = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_header_slider_option_scale_height',
	NULL,
	NULL,
	'顶部多功能组件 - 背景显示 - 长宽比例',
	'按比例自动高度，填写后，幻灯片会按照设置的比例保持高度，同时下方PC端高度和移动端高端将失效，例如：35'
);
$joe_header_slider_option_scale_height->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_scale_height);

$joe_header_slider_option_auto_height = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_header_slider_option_auto_height',
	NULL,
	'550px || 280px',
	'顶部多功能组件 - 背景显示 - 自动高度',
	'说明：自动高度，填写后，会根据幻灯片背景图自动调节每张幻灯片高度，同时下方PC端高度和移动端高端将失效<br>格式：电脑端高度 || 移动端高度<br>例如：550px || 280px'
);
$joe_header_slider_option_auto_height->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_auto_height);

$joe_header_slider_option_height = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_header_slider_option_height',
	NULL,
	NULL,
	'顶部多功能组件 - 背景显示 - 固定高度',
	'格式：电脑端高度 || 移动端高度<br>例如：550px || 280px'
);
$joe_header_slider_option_height->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_height);

$joe_header_slider_option_spacebetween = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_header_slider_option_spacebetween',
	NULL,
	'0',
	'顶部多功能组件 - 背景显示 - 幻灯片间距',
	'例如：0'
);
$joe_header_slider_option_spacebetween->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_spacebetween);

$joe_header_slider_option_speed = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_header_slider_option_speed',
	NULL,
	'0',
	'顶部多功能组件 - 背景显示 - 切换速度',
	'毫秒单位，设置为“0”，则为自动模式：根据幻灯片大小自动设置最佳速度'
);
$joe_header_slider_option_speed->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_speed);

$joe_header_slider_option_autoplay = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_header_slider_option_autoplay',
	['1' => '开启', '0' => '关闭'],
	'1',
	'顶部多功能组件 - 背景显示 - 自动播放'
);
$joe_header_slider_option_autoplay->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_autoplay->multiMode());

$joe_header_slider_option_interval = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_header_slider_option_interval',
	NULL,
	'3000',
	'顶部多功能组件 - 背景显示 - 停顿时间',
	'毫秒单位，自动切换的时间间隔(越小越快)'
);
$joe_header_slider_option_interval->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_interval);


$joe_header_slider_search = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_header_slider_search',
	['pc' => 'PC端显示', 'mobile' => '移动端显示'],
	['pc', 'mobile'],
	'顶部多功能组件 - 叠加搜索组件',
	'在背景上方叠加显示的搜索组件'
);
$joe_header_slider_search->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_search);

$joe_header_slider_option_popular_limit = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_header_slider_search_option_popular_limit',
	NULL,
	'6',
	'顶部多功能组件 - 搜索组件 - 热门搜索关键词数量',
	'显示网站热门搜索关键词最多数量（移动端不会显示）'
);
$joe_header_slider_option_popular_limit->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_option_popular_limit);

$joe_header_slider_search_option_before_html = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_header_slider_search_option_before_html',
	NULL,
	'<div class="em16 font-bold mb10">更优雅的Typecho主题</div>' . "\n" . '<div>这是导航栏幻灯片多功能组件，可在后台进行配置</div>',
	'顶部多功能组件 - 搜索组件 - 上方额外内容',
	'组件【上方】添加额外内容，支持HTML代码，请注意代码规范，同时请注意组件总高度！'
);
$joe_header_slider_search_option_before_html->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_search_option_before_html);

$joe_header_slider_search_option_after_html = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_header_slider_search_option_after_html',
	NULL,
	'',
	'顶部多功能组件 - 搜索组件 - 下方额外内容',
	'组件【下方】添加额外内容，支持HTML代码，请注意代码规范，同时请注意组件总高度！'
);
$joe_header_slider_search_option_after_html->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_search_option_after_html);


$joe_header_slider_card = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_header_slider_card',
	['pc' => 'PC端显示', 'mobile' => '移动端显示'],
	['pc', 'mobile'],
	'顶部多功能组件 - 叠加封面卡片组件',
	'在背景下方叠加显示的图标卡片组件'
);
$joe_header_slider_card->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_card);

$joe_header_slider_card_option_show_widget_bg = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_header_slider_card_option_show_widget_bg',
	['1' => '开启', '0' => '关闭'],
	'0',
	'顶部多功能组件 - 封面卡片 - 模块背景',
	'开启后整个模块显示连成一块的背景，关闭后每个卡片都显示背景'
);
$joe_header_slider_card_option_show_widget_bg->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_card_option_show_widget_bg->multiMode());

$joe_header_slider_card_option_icon_radius = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_header_slider_card_option_icon_radius',
	['1' => '开启', '0' => '关闭'],
	'1',
	'顶部多功能组件 - 封面卡片 - 圆角图标',
	'图标显示为圆形，而不是正方形'
);
$joe_header_slider_card_option_icon_radius->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_card_option_icon_radius->multiMode());

$joe_header_slider_card_option_cards = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_header_slider_card_option_cards',
	NULL,
	'#icon-vip_1 || c-yellow || 图标卡片 || 这是一个图标卡片示例
#icon-vip_2 || c-blue-2 || 原创作品 || 这是一个图标卡片示例
#icon-hot || jb-pink || 灵感来源<badge class="ml6 jb-yellow">NEW</badge> || 这是一个图标卡片示例
fa-ioxhost || jb-cyan || 系统工具 <badge class="ml6 jb-blue">GO <span class="fa fa-angle-right em12"></span></badge> || 这是一个图标卡片示例',
	'顶部多功能组件 - 封面卡片 - 添加卡片',
	'一行一个，格式：图标代码 || 图标颜色 || 标题 || 简介 || 链接'
);
$joe_header_slider_card_option_cards->setAttribute('class', 'joe_content joe_header');
$joe_header_slider_card_option_cards->setInputsAttribute('rows', '8');
$form->addInput($joe_header_slider_card_option_cards);


$joe_header_slider_filter_blur = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_header_slider_filter_blur',
	['pc' => 'PC端开启', 'mobile' => '移动端开启'],
	['pc', 'mobile'],
	'顶部多功能组件 - 组件高斯模糊特效',
	'搜索组件和卡片组件背景显示高斯模糊特效（高斯模糊特效比较占用浏览器性能，部分性能较低的设备可能会不流畅）'
);
$joe_header_slider_filter_blur->setAttribute('class', 'joe_content joe_header');
$form->addInput($joe_header_slider_filter_blur);
