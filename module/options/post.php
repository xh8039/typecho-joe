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

// $JPostMetaReferrer = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JPostMetaReferrer',
// 	NULL,
// 	NULL,
// 	'文章页面Referrer属性',
// 	'介绍：设置为 no-referrer 可有效破解对方站点的图片、视频等防盗链功能，留空则浏览器会发送默认的Referrer请求头'
// );
// $JPostMetaReferrer->setAttribute('class', 'joe_content joe_post');
// $form->addInput($JPostMetaReferrer);

$joe_post_list_mode = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_post_list_mode',
	['list' => '列表模式（默认）', 'card' => '卡片模式'],
	'list',
	'文章列表 - 显示模式'
);
$joe_post_list_mode->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_post_list_mode->multiMode());

$joe_article_list_title_bold = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_article_list_title_bold',
	['off' => '关闭（默认）', 'on' => '开启'],
	'off',
	'文章列表 - 标题粗体'
);
$joe_article_list_title_bold->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_article_list_title_bold->multiMode());

$joe_article_image_cover = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_article_image_cover',
	['1' => '开启（默认）', '0' => '关闭'],
	'1',
	'文章页面 - 图片封面',
	'允许设置文章页顶部显示封面图'
);
$joe_article_image_cover->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_article_image_cover->multiMode());

$joe_article_content_indent = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_article_content_indent',
	['off' => '关闭（默认）', 'on' => '开启'],
	'off',
	'文章页面 - 内容段落缩进',
	'开启后文章内容每一个段落首行将向右偏移2个文字距离'
);
$joe_article_content_indent->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_article_content_indent->multiMode());

$joe_article_motto_box = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_article_motto_box',
	['on' => '开启（默认）', 'off' => '关闭'],
	'on',
	'文章页面 - 下方独立一言版块'
);
$joe_article_motto_box->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_article_motto_box->multiMode());

$joe_article_copyright = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_article_copyright',
	NULL,
	'文章版权归作者所有，未经允许请勿转载。',
	'文章页面 - 版权声明',
	'支持HTML代码，请注意代码规范及标签闭合'
);
$joe_article_copyright->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_article_copyright);

$joe_article_action_top_text = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_article_action_top_text',
	NULL,
	'喜欢就支持一下吧',
	'文章页面 - 页脚文案',
	'文章底部打赏、分享按钮上面的文字'
);
$joe_article_action_top_text->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_article_action_top_text);

$JWeChatRewardImg = new \Typecho\Widget\Helper\Form\Element\Text(
	'JWeChatRewardImg',
	NULL,
	NULL,
	'文章页面 - 微信打赏收款码',
	'介绍：微信赞赏收款码链接，不填写则不使用<br>格式：图片文件直链地址 或 Base64地址'
);
$JWeChatRewardImg->setAttribute('class', 'joe_content joe_post');
$form->addInput($JWeChatRewardImg);

$JAlipayRewardImg = new \Typecho\Widget\Helper\Form\Element\Text(
	'JAlipayRewardImg',
	NULL,
	NULL,
	'文章页面 - 支付宝打赏收款码',
	'介绍：支付宝赞赏收款码链接，不填写则不使用<br>格式：图片文件直链地址 或 Base64地址'
);
$JAlipayRewardImg->setAttribute('class', 'joe_content joe_post');
$form->addInput($JAlipayRewardImg);

// $JPost_Title_Center = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JPost_Title_Center',
// 	['off' => '关闭（默认）', 'on' => '开启'],
// 	'off',
// 	'是否开启文章标题居中',
// 	'介绍：开启后文章页和独立页面的文章标题将会居中显示'
// );
// $JPost_Title_Center->setAttribute('class', 'joe_content joe_post');
// $form->addInput($JPost_Title_Center);

// $JPost_Header_Img_Switch = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JPost_Header_Img_Switch',
// 	['off' => '关闭（默认）', 'on' => '开启'],
// 	'off',
// 	'是否开启文章页面顶部大图',
// 	'介绍：开启后顶部大图将背景将使用文章缩略图 文字将使用文字标题 如果没有文章没有缩略图那么使用首页顶部大图和侧边栏随机一言充当文字'
// );
// $JPost_Header_Img_Switch->setAttribute('class', 'joe_content joe_post');
// $form->addInput($JPost_Header_Img_Switch);

// $JPost_Header_Img = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JPost_Header_Img',
// 	NULL,
// 	NULL,
// 	'文章页顶部大图背景壁纸',
// 	'介绍：填写后将强制代替文章页顶部大图所有背景壁纸并忽略顶部大图开关<br>
// 	格式：图片地址 或 Base64地址<br>'
// );
// $JPost_Header_Img->setAttribute('class', 'joe_content joe_post');
// $form->addInput($JPost_Header_Img);

// $JArticle_Bottom_Text = new \Typecho\Widget\Helper\Form\Element\Textarea(
// 	'JArticle_Bottom_Text',
// 	NULL,
// 	NULL,
// 	'文章底部自定义信息',
// 	'介绍：暂无 <br>
// 		 格式：一行代表一列<br>
// 		 例：<br>
// 		 本站资源多为网络收集，如涉及版权问题请及时与站长联系，我们会在第一时间内删除资源。<br>
// 		 本站用户发帖仅代表本站用户个人观点，并不代表本站赞同其观点和对其真实性负责。<br>
// 		 本站一律禁止以任何方式发布或转载任何违法的相关信息，访客发现请向站长举报。<br>
// 		 本站资源大多存储在云盘，如发现链接失效，请及时与站长联系，我们会第一时间更新。<br>
// 		 转载本网站任何内容，请按照转载方式正确书写本站原文地址。<br>'
// );
// $JArticle_Bottom_Text->setAttribute('class', 'joe_content joe_post');
// $form->addInput($JArticle_Bottom_Text);

// $JPost_Ad = new \Typecho\Widget\Helper\Form\Element\Textarea(
// 	'JPost_Ad',
// 	NULL,
// 	NULL,
// 	'文章页大屏广告',
// 	'介绍：请务必填写正确的格式 <br />
// 		格式：广告图片 || 广告链接（可为空） || 广告文字（可为空）（中间使用两个竖杠分隔，一行一个）<br />
// 		例如：https://puui.qpic.cn/media_img/lena/PICykqaoi_580_1680/0 || https://baidu.com || 广告'
// );
// $JPost_Ad->setAttribute('class', 'joe_content joe_post');
// $form->addInput($JPost_Ad);

// $JPost_Record_Detection = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JPost_Record_Detection',
// 	['off' => '关闭（默认）', 'on' => '开启'],
// 	'off',
// 	'是否开启文章百度收录检测'
// );
// $JPost_Record_Detection->setAttribute('class', 'joe_content joe_post');
// $form->addInput($JPost_Record_Detection);

// if (!empty(\Helper::options()->JPost_Record_Detection) && \Helper::options()->JPost_Record_Detection == 'on') {
// 	$BaiduRecordCookie = new \Typecho\Widget\Helper\Form\Element\Textarea(
// 		'BaiduRecordCookie',
// 		NULL,
// 		NULL,
// 		'百度收录检测请求 Cookie 标头',
// 		'介绍：检测百度是否收录指定文章时必须带有正确的 Cookie，否则会检测失败<br>
// 		获取方法：[<a href="https://www.baidu.com/s?wd=blog.yihang.info&rn=1&tn=json&ie=utf-8&cl=3&f=9" target="_blank">进入此网址</a>] 后打开浏览器开发者工具，再次刷新该网址的窗口，查看调试界面网络栏中的原始请求标头中的 Cookie 请求头的值，复制粘贴到这里即可'
// 	);
// 	$BaiduRecordCookie->setAttribute('class', 'joe_content joe_post');
// 	$form->addInput($BaiduRecordCookie);

// 	$BaiduRecordUserAgent = new \Typecho\Widget\Helper\Form\Element\Text(
// 		'BaiduRecordUserAgent',
// 		NULL,
// 		NULL,
// 		'百度收录检测请求 User-Agent 标头',
// 		'介绍：检测百度是否收录指定文章时必须带有正确的 User-Agent，否则会检测失败<br>
// 		获取方法：[<a href="https://www.baidu.com/s?wd=blog.yihang.info&rn=1&tn=json&ie=utf-8&cl=3&f=9" target="_blank">进入此网址</a>] 后打开浏览器开发者工具，再次刷新该网址的窗口，查看调试界面网络栏中的原始请求标头中的 User-Agent 请求头的值，复制粘贴到这里即可'
// 	);
// 	$BaiduRecordUserAgent->setAttribute('class', 'joe_content joe_post');
// 	$form->addInput($BaiduRecordUserAgent);

// 	$BaiduPushToken = new \Typecho\Widget\Helper\Form\Element\Text(
// 		'BaiduPushToken',
// 		NULL,
// 		NULL,
// 		'百度推送Token',
// 		'介绍：填写此处，前台文章页如果未收录，则会自动将当前链接推送给百度加快收录 <br />
// 			 其他：Token在百度收录平台注册账号获取'
// 	);
// 	$BaiduPushToken->setAttribute('class', 'joe_content joe_post');
// 	$form->addInput($BaiduPushToken);

// 	$BingPushToken = new \Typecho\Widget\Helper\Form\Element\Text(
// 		'BingPushToken',
// 		NULL,
// 		NULL,
// 		'必应推送Token',
// 		'介绍：填写此处，则会自动将当前链接推送给必应加快收录 <br />
// 			 其他：Token在必应收录平台注册账号获取'
// 	);
// 	$BingPushToken->setAttribute('class', 'joe_content joe_post');
// 	$form->addInput($BingPushToken);
// }

$joe_article_content_nav = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_article_content_nav',
	['on' => '开启（默认）', 'off' => '关闭'],
	'on',
	'文章功能 - 文章目录树',
	'开启后请自行添加文章目录树模块到侧边栏（文章内标题超过3个才会显示）'
);
$joe_article_content_nav->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_article_content_nav->multiMode());

// $JOverdue = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JOverdue',
// 	NULL,
// 	NULL,
// 	'是否开启文章更新时间大于多少天提示（仅针对文章有效）',
// 	'介绍：开启后如果文章在多少天内无任何修改，则进行提示 <br>
// 	填写示例：365'
// );
// $JOverdue->setAttribute('class', 'joe_content joe_post');
// $form->addInput($JOverdue->multiMode());

$joe_article_code_theme_light_options = [
	'enlighter' => '浅色: Enlighter',
	'bootstrap4' => '浅色: Bootstrap',
	'classic' => '浅色：Classic',
	'beyond' => '浅色：Beyond',
	'mowtwo' => '浅色：Mowtwo',
	'eclipse' => '浅色：Eclipse',
	'droide' => '浅色：Droide',
	'minimal' => '浅色：Minimal',
	'rowhammer' => '浅色：Rowhammer',
	'godzilla' => '浅色：Godzilla',
	'dracula' => '深色：Dracula',
	'atomic' => '深色：Atomic',
	'monokai' => '深色：Monokai',
];
$joe_article_code_theme_light = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_article_code_theme_light',
	$joe_article_code_theme_light_options,
	'enlighter',
	'文章代码高亮主题- 日间',
	'介绍：用于修改代码块的高亮风格'
);
$joe_article_code_theme_light->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_article_code_theme_light->multiMode());

$joe_article_code_theme_dark = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_article_code_theme_dark',
	[
		'dracula' => '深色：Dracula',
		'atomic' => '深色：Atomic',
		'monokai' => '深色：Monokai'
	],
	'dracula',
	'文章代码高亮主题- 夜间',
	'介绍：用于修改代码块的高亮风格'
);
$joe_article_code_theme_dark->setAttribute('class', 'joe_content joe_post');
$form->addInput($joe_article_code_theme_dark->multiMode());

// $JQQRewardImg = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'JQQRewardImg',
// 	NULL,
// 	NULL,
// 	'QQ赞赏收款码',
// 	'介绍：QQ赞赏收款码链接，不填写则不使用<br>格式：图片文件直链地址 或 Base64地址'
// );
// $JQQRewardImg->setAttribute('class', 'joe_content joe_post');
// $form->addInput($JQQRewardImg);

$JEditor = new \Typecho\Widget\Helper\Form\Element\Select(
	'JEditor',
	array('on' => '开启（默认）', 'off' => '关闭'),
	'on',
	'文章功能 - Joe自定义编辑器',
	'介绍：开启后，文章编辑器将替换成Joe编辑器 <br>
		 其他：目前编辑器处于拓展阶段，如果想继续使用原生编辑器，关闭此项即可'
);
$JEditor->setAttribute('class', 'joe_content joe_post');
$form->addInput($JEditor->multiMode());
