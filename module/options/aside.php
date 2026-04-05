<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}

// $JAside_Notice = new \Typecho\Widget\Helper\Form\Element\Textarea(
// 	'JAside_Notice',
// 	NULL,
// 	NULL,
// 	'站点公告模块（非必填）',
// 	'介绍：请务必填写正确的格式 <br />
// 		 格式：通知文字<br />
// 		 例如：' . htmlentities('欢迎加入易航Joe再续前缘交流群：<a href="https://qm.qq.com/q/ewMaEV6yHe" target="_blank" rel="nofollow">782778569</a>')
// );
// $JAside_Notice->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_Notice);

$page = ['index' => '首页', 'category' => '分类', 'tag' => '标签', 'search' => '搜索', 'post' => '文章', 'page' => '单页', 'friend' => '友链', 'archive' => '存档'];

$joe_sidebar = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_sidebar',
	$page,
	['index', 'post'],
	'全局侧边模块显示页面 - PC'
);
$joe_sidebar->setAttribute('class', 'joe_content joe_aside');
$form->addInput($joe_sidebar);

$joe_sidebar_user = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_sidebar_user',
	$page,
	['index', 'post'],
	'用户信息模块'
);
$joe_sidebar_user->setAttribute('class', 'joe_content joe_aside');
$form->addInput($joe_sidebar_user);

$joe_sidebar_hot_post = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_sidebar_hot_post',
	$page,
	['index'],
	'热榜文章模块'
);
$joe_sidebar_hot_post->setAttribute('class', 'joe_content joe_aside');
$form->addInput($joe_sidebar_hot_post);

$joe_sidebar_hot_post_num = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_sidebar_hot_post_num',
	NULL,
	'5',
	'热榜文章最大显示数量'
);
$joe_sidebar_hot_post_num->setAttribute('class', 'joe_content joe_aside');
$form->addInput($joe_sidebar_hot_post_num);

$joe_sidebar_new_comment = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_sidebar_new_comment',
	$page,
	['index'],
	'最近评论模块'
);
$joe_sidebar_new_comment->setAttribute('class', 'joe_content joe_aside');
$form->addInput($joe_sidebar_new_comment);

$joe_sidebar_tag_list = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_sidebar_tag_list',
	$page,
	['index'],
	'标签云模块'
);
$joe_sidebar_tag_list->setAttribute('class', 'joe_content joe_aside');
$form->addInput($joe_sidebar_tag_list);

$joe_sidebar_motto = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_sidebar_motto',
	$page,
	['index', 'post'],
	'一言模块'
);
$joe_sidebar_motto->setAttribute('class', 'joe_content joe_aside');
$form->addInput($joe_sidebar_motto);

$joe_sidebar_custom_html = new \Typecho\Widget\Helper\Form\Element\Checkbox(
	'joe_sidebar_custom_html',
	$page,
	[],
	'自定义HTML模块'
);
$joe_sidebar_custom_html->setAttribute('class', 'joe_content joe_aside');
$form->addInput($joe_sidebar_custom_html);

// $Joe_Sidebar_HTML = new \Typecho\Widget\Helper\Form\Element\Textarea(
// 	'Joe_Sidebar_HTML',
// 	NULL,
// 	Null,
// 	'自定义侧栏HTML'
// );
// $Joe_Sidebar_HTML->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($Joe_Sidebar_HTML);

// $JADContent = new \Typecho\Widget\Helper\Form\Element\Textarea(
// 	'JADContent',
// 	NULL,
// 	NULL,
// 	'侧边栏广告',
// 	'介绍：用于设置侧边栏广告 <br />
// 		 格式：广告图片 || 跳转链接 （中间使用两个竖杠分隔）<br />
// 		 注意：如果您只想显示图片不想跳转，可填写：广告图片 || javascript:void(0)'
// );
// $JADContent->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JADContent);

// $JAside_Wap_Image = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JAside_Wap_Image',
// 	NULL,
// 	'//api.yihang.info/api/wallpaper/phone.php',
// 	'博主栏背景壁纸 - WAP',
// 	'介绍：用于修改移动端博主栏的背景壁纸 <br/>
// 		 格式：图片地址 或 Base64地址'
// );
// $JAside_Wap_Image->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_Wap_Image);

// $JAside_Wap_Image_Height = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JAside_Wap_Image_Height',
// 	NULL,
// 	'100%',
// 	'博主栏背景壁纸高度 - WAP',
// 	'介绍：用于修改移动端博主栏的背景壁纸高度 <br>
// 	例如：100%（全屏）丨auto（自动按照图片高度）丨150px（指定高度）'
// );
// $JAside_Wap_Image_Height->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_Wap_Image_Height);

// $JAside_Timelife_Status = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JAside_Timelife_Status',
// 	array(
// 		'off' => '关闭（默认）',
// 		'on' => '开启'
// 	),
// 	'off',
// 	'是否开启人生倒计时模块 - PC',
// 	NULL
// );
// $JAside_Timelife_Status->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_Timelife_Status->multiMode());

// $JAside_Random_Girl_Api = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JAside_Random_Girl_Api',
// 	NULL,
// 	NULL,
// 	'随机小姐姐视频API - PC',
// 	'介绍：用于展示随机美女视频 <br/>
// 	注意：填写时务必填写正确！不填写则不会显示，填写多个请用 || 分割'
// );
// $JAside_Random_Girl_Api->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_Random_Girl_Api);

// $JAside_Weather_Key = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JAside_Weather_Key',
// 	NULL,
// 	NULL,
// 	'天气栏KEY值 - PC',
// 	'介绍：用于初始化天气栏 <br/>
// 		 注意：填写时务必填写正确！不填写则不会显示<br />
// 		 其他：免费申请地址：<a href="//widget.qweather.com/create-standard">widget.qweather.com/create-standard</a><br />
// 		 简要：在网页生成时，配置项随便选择，只需要生成代码后的Token即可'
// );
// $JAside_Weather_Key->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_Weather_Key);

// $JAside_Newreply_Status = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JAside_Newreply_Status',
// 	array(
// 		'off' => '关闭（默认）',
// 		'on' => '开启'
// 	),
// 	'off',
// 	'是否开启最新回复栏 - PC',
// 	'介绍：用于控制是否开启最新回复栏 <br>
// 		 注意：如果您关闭了全站评论，将不会显示最新回复！'
// );
// $JAside_Newreply_Status->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_Newreply_Status->multiMode());

// $JAside_Weather_Style = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JAside_Weather_Style',
// 	array(
// 		'1' => '自动（默认）',
// 		'2' => '浅色',
// 		'3' => '深色'
// 	),
// 	'1',
// 	'选择天气栏的风格 - PC',
// 	'介绍：选择一款您所喜爱的天气风格 <br />
// 		 注意：需要先填写天气的KEY值才会生效'
// );
// $JAside_Weather_Style->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_Weather_Style->multiMode());

// $JAside_3DTag = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JAside_3DTag',
// 	['off' => '关闭（默认）', 'on' => '开启'],
// 	'off',
// 	'是否开启3D标签云 - PC',
// 	NULL
// );
// $JAside_3DTag->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_3DTag->multiMode());

// $JAsideTagList = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JAsideTagList',
// 	['on' => '开启（默认）', 'off' => '关闭'],
// 	'on',
// 	'是否开启列表标签云 - PC',
// 	NULL
// );
// $JAsideTagList->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAsideTagList->multiMode());

// $JAside_Flatterer = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JAside_Flatterer',
// 	array(
// 		'off' => '关闭（默认）',
// 		'on' => '开启'
// 	),
// 	'off',
// 	'是否开启舔狗日记 - PC',
// 	NULL
// );
// $JAside_Flatterer->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_Flatterer->multiMode());

// $JAside_History_Today = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JAside_History_Today',
// 	array(
// 		'off' => '关闭（默认）',
// 		'on' => '开启'
// 	),
// 	'off',
// 	'是否开启那年今日 - PC',
// 	'介绍：用于设置侧边栏是否显示往年今日的文章 <br />
// 		 其他：如果往年今日有文章则显示，没有则不显示！'
// );
// $JAside_History_Today->setAttribute('class', 'joe_content joe_aside');
// $form->addInput($JAside_History_Today->multiMode());
