<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}

$joe_notice_switch = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_notice_switch',
	['on' => '开启（默认）', 'off' => '关闭'],
	'on',
	'弹窗通知'
);
$joe_notice_switch->setAttribute('class', 'joe_content joe_notice');
$form->addInput($joe_notice_switch->multiMode());

$joe_notice_policy = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_notice_policy',
	['' => '一直显示', 'signin' => '登录后不显示'],
	'',
	'显示策略'
);
$joe_notice_policy->setAttribute('class', 'joe_content joe_notice');
$form->addInput($joe_notice_policy->multiMode());

$joe_notice_size = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_notice_size',
	['modal-sm' => 'mini（默认）', 'modal-mini' => '小', '' => '中', 'modal-lg' => '大'],
	'modal-sm',
	'窗口尺寸'
);
$joe_notice_size->setAttribute('class', 'joe_content joe_notice');
$form->addInput($joe_notice_size->multiMode());

$joe_notice_title = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_notice_title',
	NULL,
	'主题模板推荐',
	'弹窗标题 - 内容',
);
$joe_notice_title->setAttribute('class', 'joe_content joe_notice');
$form->addInput($joe_notice_title);

$joe_notice_title_style = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_notice_title_style',
	['colorful' => '炫彩背景（默认）', 'default' => '单色背景'],
	'colorful',
	'弹窗标题 - 显示样式'
);
$joe_notice_title_style->setAttribute('class', 'joe_content joe_notice');
$form->addInput($joe_notice_title_style->multiMode());

$joe_notice_title_icon = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_notice_title_icon',
	NULL,
	'<i class="fa fa-heart" aria-hidden="true"></i>',
	'弹窗标题 - 图标',
);
$joe_notice_title_icon->setAttribute('class', 'joe_content joe_notice');
$form->addInput($joe_notice_title_icon);

$joe_notice_title_class = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_notice_title_class',
	[
		'c-red' => 'c-red',
		'c-red-2' => 'c-red-2',
		'c-yellow' => 'c-yellow',
		'c-yellow-2' => 'c-yellow-2',
		'c-cyan' => 'c-cyan',
		'c-blue' => 'c-blue',
		'c-blue-2' => 'c-blue-2',
		'c-green' => 'c-green',
		'c-green-2' => 'c-green-2',
		'c-purple' => 'c-purple',
		'c-purple-2' => 'c-purple-2',
		'jb-red' => 'jb-red',
		'jb-pink' => 'jb-pink',
		'jb-yellow' => 'jb-yellow（默认）',
		'jb-cyan' => 'jb-cyan',
		'jb-blue' => 'jb-blue',
		'jb-green' => 'jb-green',
		'jb-purple' => 'jb-purple',
		'jb-vip1' => 'jb-vip1',
		'jb-vip2' => 'jb-vip2',
	],
	'jb-yellow',
	'弹窗标题 - 背景主题'
);
$joe_notice_title_class->setAttribute('class', 'joe_content joe_notice');
$form->addInput($joe_notice_title_class->multiMode());

$joe_notice_content = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_notice_content',
	NULL,
	'<p class="c-yellow">本站采用Joe主题建站</p>
<p>Joe再续前缘主题是一款漂亮优雅的商城资讯类网站主题模板，功能强大，配置简单</p>
这是一条系统弹窗通知示例<br/>
管理员可在 <span class="c-blue">主题设置-弹窗通知</span> 中进行相关设置',
	'弹窗内容',
	'支持HTML代码，请注意代码规范及标签闭合'
);
$joe_notice_content->setAttribute('class', 'joe_content joe_notice');
$joe_notice_content->setInputsAttribute('rows', '4');
$form->addInput($joe_notice_content);

$joe_notice_button = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_notice_button',
	NULL,
	"了解Joe主题 || http://blog.yihang.info/ || c-blue\n立即设置 || /admin/options-theme.php || c-green",
	'弹窗按钮',
	'颜色可参考弹窗标题背景主题，一行一个，格式：文字 || 链接 || 颜色',
);
$joe_notice_button->setAttribute('class', 'joe_content joe_notice');
$joe_notice_button->setInputsAttribute('rows', '2');
$form->addInput($joe_notice_button);

$joe_notice_button_radius = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_notice_button_radius',
	['0' => '关闭（默认）', '1' => '开启'],
	'0',
	'弹窗按钮 - 圆角显示'
);
$joe_notice_button_radius->setAttribute('class', 'joe_content joe_notice');
$form->addInput($joe_notice_button_radius->multiMode());

$joe_notice_expires = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_notice_expires',
	NULL,
	'12',
	'弹窗周期',
	'多少小时内不重复弹窗（允许为小数，为0则每次刷新页面都会弹出）注意：修改此项需刷新浏览器缓存后才能看到效果'
);
$joe_notice_expires->setAttribute('class', 'joe_content joe_notice');
$form->addInput($joe_notice_expires);
