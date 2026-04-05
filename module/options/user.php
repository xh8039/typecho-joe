<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}

$JUser_Switch = new \Typecho\Widget\Helper\Form\Element\Select(
	'JUser_Switch',
	array('on' => '开启（默认）', 'off' => '关闭'),
	'on',
	'是否开启主题自带登录注册功能',
	'介绍：开启后博客将享有更优美的登录注册页面<br>
	注意：启用后不可使用其他登录插件 以免产生冲突<br>
	提示：Typecho 自带的登录注册文件可自行删除或重命名<br>
	文件路径：admin/login.php || admin/register.php'
);
$JUser_Switch->setAttribute('class', 'joe_content joe_user');
$form->addInput($JUser_Switch->multiMode());

$JUserRegisterGroup = new \Typecho\Widget\Helper\Form\Element\Select(
	'JUserRegisterGroup',
	array('subscriber' => '关注者', 'contributor' => '贡献者（默认）', 'editor' => '编辑', 'administrator' => '管理员'),
	'contributor',
	'用户注册默认等级',
	'介绍：需要开启主题自带的登录注册功能方可生效，Typecho默认用户注册后的权限是关注者<br>
	关注者：只能修改自己的档案信息<br>
	贡献者：可撰写和管理自己的文章，上传和管理自己的文件<br>
	编辑：可管理所有的文章、分类、评论、标签、文件，但是不能修改设置<br>
	管理员：和你的权限一样
	'
);
$JUserRegisterGroup->setAttribute('class', 'joe_content joe_user');
$form->addInput($JUserRegisterGroup->multiMode());

// $JUserRetrieve = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JUserRetrieve',
// 	array('on' => '开启（默认）', 'off' => '关闭'),
// 	'on',
// 	'找回密码',
// 	'介绍：未配置邮箱无法发送验证码 访问地址：<a target="_blank" href="' . Typecho\Common::url('user/retrieve', Helper::options()->index) . '">' . Typecho\Common::url('user/retrieve', Helper::options()->index) . '</a>'
// );
// $JUserRetrieve->setAttribute('class', 'joe_content joe_user');
// $form->addInput($JUserRetrieve->multiMode());
$joe_sidebar_user_background;
$joe_user_background = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_user_background',
	NULL,
	NULL,
	'用户背景图片/视频',
	'介绍：用于修改PC端博主栏的背景壁纸，一行一个，随机展示 <br/>
	格式：图片/视频地址 或 Base64地址，是否视频类型默认通过后缀名是否为.mp4判断，如需强制视频，请在URL开头添加 video:'
);
$joe_user_background->setAttribute('class', 'joe_content joe_user');
$form->addInput($joe_user_background);

$joe_user_sign_page_footer = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_user_sign_page_footer',
	NULL,
	'Copyright © 2026 · <a href="http://blog.yihang.info">易航博客</a> · 由 <a target="_blank" href="http://blog.yihang.info">Joe主题</a> 强力驱动.',
	'登录注册页脚内容',
	'在页面底部添加内容，支持HTML代码（不建议内容过多）'
);
$joe_user_sign_page_footer->setAttribute('class', 'joe_content joe_user');
$form->addInput($joe_user_sign_page_footer);

$joe_user_agreement_page_url = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_user_agreement_page_url',
	NULL,
	NULL,
	'用户协议页面地址',
);
$joe_user_agreement_page_url->setAttribute('class', 'joe_content joe_user');
$form->addInput($joe_user_agreement_page_url);

$joe_user_privacy_page_url = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_user_privacy_page_url',
	NULL,
	NULL,
	'隐私协议页面地址',
);
$joe_user_privacy_page_url->setAttribute('class', 'joe_content joe_user');
$form->addInput($joe_user_privacy_page_url);