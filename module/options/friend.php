<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}

$JFriends = new \Typecho\Widget\Helper\Form\Element\Hidden(
	'JFriends',
	NULL,
	NULL,
	'友情链接',
	'<b>主题设置处友情链接已停止使用，请转到 菜单->管理->友链 处管理您的友情链接<br />
	注意：您需要先增加友链页面（新增独立页面-模板选择友链），该项才会生效</b>'
);
$JFriends->setAttribute('class', 'joe_content joe_friend');
$form->addInput($JFriends);

$JFriends_Search = new \Typecho\Widget\Helper\Form\Element\Select(
	'JFriends_Search',
	array('on' => '开启（默认）', 'off' => '关闭'),
	'on',
	'友情链接搜索模块',
	'介绍：开启后，会在页面上方显示搜索引擎搜索框，用户可以直接在页面上搜索'
);
$JFriends_Search->setAttribute('class', 'joe_content joe_friend');
$form->addInput($JFriends_Search->multiMode());

$JFriends_Search_Background = new \Typecho\Widget\Helper\Form\Element\Text(
	'JFriends_Search_Background',
	NULL,
	NULL,
	'友情链接搜索模块背景图',
	'介绍：填写 URL 直链，不填则使用默认背景'
);
$JFriends_Search_Background->setAttribute('class', 'joe_content joe_friend');
$form->addInput($JFriends_Search_Background);

$JFriends_shuffle = new \Typecho\Widget\Helper\Form\Element\Select(
	'JFriends_shuffle',
	array('on' => '开启（默认）', 'off' => '关闭'),
	'on',
	'友情链接随机排序',
	NULL
);
$JFriends_shuffle->setAttribute('class', 'joe_content joe_friend');
$form->addInput($JFriends_shuffle->multiMode());

$JFriends_Spider_Hide = new \Typecho\Widget\Helper\Form\Element\Select(
	'JFriends_Spider_Hide',
	array('off' => '关闭（默认）', 'on' => '开启'),
	'off',
	'友情链接对蜘蛛引擎隐藏'
);
$JFriends_Spider_Hide->setAttribute('class', 'joe_content joe_friend');
$form->addInput($JFriends_Spider_Hide->multiMode());

$JFriends_Submit_Button_Text = new \Typecho\Widget\Helper\Form\Element\Text(
	'JFriends_Submit_Button_Text',
	NULL,
	'申请入驻',
	'友情链接提交按钮文字',
	'介绍：填写后开启友情链接提交功能，不填则关闭该功能<br>
	注意：需正确配置邮箱 否则收不到申请<br>
	示例：申请入驻'
);
$JFriends_Submit_Button_Text->setAttribute('class', 'joe_content joe_friend');
$form->addInput($JFriends_Submit_Button_Text);

$JFriends_Submit_Description_Value = "<div>\n    <li>您的网站已稳定运行，且有一定的文章量</li>\n    <li>原创、技术、设计类网站优先考虑</li>\n    <li>不收录有反动、色情、赌博等不良内容或提供不良内容链接的网站</li>\n    <li>您需要将本站链接放置在您的网站中</li>\n    <li>请选择正方形的LOGO图像</li>\n</div>";
$JFriends_Submit_Description = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'JFriends_Submit_Description',
	NULL,
	$JFriends_Submit_Description_Value,
	'友情链接提交说明',
	'示例：<br>' . str_replace(["\n", ' '], ['<br>', '&nbsp;'], htmlentities($JFriends_Submit_Description_Value))
);
$JFriends_Submit_Description->setAttribute('class', 'joe_content joe_friend');
$JFriends_Submit_Description->setInputsAttribute('rows', '7');
$form->addInput($JFriends_Submit_Description);