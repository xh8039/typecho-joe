<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit(1);
}

// $JTurbolinks = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JTurbolinks',
// 	['on' => '开启（默认）', 'off' => '关闭'],
// 	'on',
// 	'TurboLinks单页模式',
// 	'介绍：目前处于测试阶段，Turbolinks 可以更快地导航您的 Web 应用程序。获得单页应用程序的性能优势，而不会增加客户端 JavaScript 框架的复杂性。使用 HTML 在服务器端呈现您的视图，并像往常一样链接到页面。当您点击链接时，Turbolinks 会自动获取该页面，交换并合并该页面，所有这些都不会产生整个页面加载的成本，开启后网站全局音乐不会被打断'
// );
// $JTurbolinks->setAttribute('class', 'joe_content joe_global');
// $form->addInput($JTurbolinks);

$joe_theme_mode = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_theme_mode',
	['system' => '跟随系统（默认）', 'white-theme' => '日间亮色主题', 'dark-theme' => '夜间深色主题'],
	'system',
	'默认主题风格',
	'介绍：此处设置为默认风格，实际显示风格以用户设置优先。如需固定风格，则关闭还需下方主题切换按钮'
);
$joe_theme_mode->setAttribute('class', 'joe_content joe_global');
$form->addInput($joe_theme_mode);

$joe_theme_mode_switch = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_theme_mode_switch',
	['on' => '开启（默认）', 'off' => '关闭'],
	'on',
	'昼夜模式切换功能',
	'介绍：关闭后用户将无法手动切换昼夜模式'
);
$joe_theme_mode_switch->setAttribute('class', 'joe_content joe_global');
$form->addInput($joe_theme_mode_switch);

$joe_theme_color = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_theme_color',
	[
		'268df7' => '<span style="background: #268df7;">#268df7</span>（默认）',
		'fd2760' => '<span style="background: #fd2760;">#fd2760</span>',
		'f04494' => '<span style="background: #f04494;">#f04494</span>',
		'ae53f3' => '<span style="background: #ae53f3;">#ae53f3</span>',
		'627bf5' => '<span style="background: #627bf5;">#627bf5</span>',
		'00a2e3' => '<span style="background: #00a2e3;">#00a2e3</span>',
		'16b597' => '<span style="background: #16b597;">#16b597</span>',
		'36af18' => '<span style="background: #36af18;">#36af18</span>',
		'8fb107' => '<span style="background: #8fb107;">#8fb107</span>',
		'b18c07' => '<span style="background: #b18c07;">#b18c07</span>',
		'e06711' => '<span style="background: #e06711;">#e06711</span>',
		'f74735' => '<span style="background: #f74735;">#f74735</span>',
	],
	'268df7',
	'全局主题高亮颜色'
);
$joe_theme_color->setAttribute('class', 'joe_content joe_global');
$form->addInput($joe_theme_color);

$joe_theme_color_custom = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_theme_color_custom',
	null,
	null,
	'全局主题高亮颜色 - 自定义',
	'十六进制颜色代码，如#268df7，务必按照格式填写'
);
$joe_theme_color_custom->setAttribute('class', 'joe_content joe_global');
$form->addInput($joe_theme_color_custom);

$joe_layout_max_width = new \Typecho\Widget\Helper\Form\Element\Text(
	'joe_layout_max_width',
	null,
	'1200px',
	'布局宽度 - 自定义',
	'全局页面布局的最大宽度，务必按照格式填写'
);
$joe_layout_max_width->setAttribute('class', 'joe_content joe_global');
$form->addInput($joe_layout_max_width);

$joe_external_link_redirect = new \Typecho\Widget\Helper\Form\Element\Select(
	'joe_external_link_redirect',
	['on' => '开启（默认）', 'off' => '关闭'],
	'on',
	'外链重定向',
	'介绍：开启此功能后，非本站的链接将会重定向至内部链接，点击后新页面跳转，有利于SEO。如果对正常链接造成了影响，请关闭此功能'
);
$joe_external_link_redirect->setAttribute('class', 'joe_content joe_global');
$form->addInput($joe_external_link_redirect);

// $JGreetToast = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JGreetToast',
// 	['on' => '开启', 'off' => '关闭（默认）'],
// 	'off',
// 	'全天候问候语',
// 	'介绍：网站顶部全天候弹出问候提示'
// );
// $JGreetToast->setAttribute('class', 'joe_content joe_global');
// $form->addInput($JGreetToast);

$JStaticAssetsUrl = new \Typecho\Widget\Helper\Form\Element\Text(
	'JStaticAssetsUrl',
	null,
	null,
	'自定义静态资源URL',
	'介绍：将本主题所需要的CSS、JS等资源文件使用某个站点来提供，以便节省服务器宽带 提升小型服务器加载速度<br>
	注意：必须保证对方站点同样为再续前缘版并且版本一致<br>
	例如：//storage.yihang.info/typecho/usr/themes/Joe@' . JOE_VERSION . '<br>
	其他：<a target="_blank" href="http://auth.yihang.info/server/joe/sitelist">本站同款站点列表</a>'
);
$JStaticAssetsUrl->setAttribute('class', 'joe_content joe_global');
$form->addInput($JStaticAssetsUrl);

$JCdnUrl = new \Typecho\Widget\Helper\Form\Element\Text(
	'JCdnUrl',
	NULL,
	NULL,
	'公共静态资源CDN接口',
	'
	<span>介绍：留空则使用本地资源，不懂请勿乱填。若您的站点宽带不高，可从下方接口列表选择或提供自己的接口。若设置不当会导致网站加载速度变慢或进不去，追求极致稳定就不要填写</span><br>
	<span>格式：URL接口 || 版本号分隔符</span><br>
	<span>注意：版本号分隔符不填写则默认为 / ，JsDelivr类型的需要使用 @</span><br>
	<span>南方科技大学（推荐）：https://mirrors.sustech.edu.cn/cdnjs/ajax/libs/</span><br>
	<span>BootCDN：https://cdn.bootcdn.net/ajax/libs/</span><br>
	<span>360CDN：https://lib.baomitu.com/</span><br>
	<span>Staticfile CDN：https://cdn.staticfile.net/</span><br>
	<span>字节跳动（距上次更新已两年多）：https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/</span><br>
	<span>Zstatic（又拍云赞助）：https://s4.zstatic.net/ajax/libs/</span><br>
	<span>7ED Services（www.7ed.net）：https://use.sevencdn.com/ajax/libs/</span><br>
	<span>渺软公益CDN回源JsDelivr（cdn.onmicrosoft.cn）：https://jsd.onmicrosoft.cn/npm/ || @</span><br>
	<span>渺软公益CDN回源UNPKG（cdn.onmicrosoft.cn）：https://npm.onmicrosoft.cn/</span><br>
	<span>渺软公益CDN回源CDNJS（cdn.onmicrosoft.cn）：https://cdnjs.onmicrosoft.cn/ajax/libs/</span><br>
	<span>360CDN: https://cdn.baomitu.com</span><br>
	<span>JsDelivr：https://cdn.jsdelivr.net/npm/ || @</span><br>
	<span>Google Hosted Libraries（国内用不了）：https://ajax.googleapis.com/ajax/libs/</span><br>
	<span>CDNJS（国内不稳定）：https://cdnjs.cloudflare.com/ajax/libs/</span><br>
	<span>烧饼博客（CDNJS镜像）：https://cdnjs.loli.net/ajax/libs/</span><br>
	'
);
$JCdnUrl->setAttribute('class', 'joe_content joe_global');
$form->addInput($JCdnUrl);

// $JNavMaxNum = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JNavMaxNum',
// 	array(
// 		'3' => '3个（默认）',
// 		'4' => '4个',
// 		'5' => '5个',
// 		'6' => '6个',
// 		'7' => '7个',
// 	),
// 	'3',
// 	'选择导航栏最大显示的个数',
// 	'介绍：用于设置最大多少个后，以更多下拉框显示'
// );
// $JNavMaxNum->setAttribute('class', 'joe_content joe_global');
// $form->addInput($JNavMaxNum->multiMode());

// $JMoreNavs = new \Typecho\Widget\Helper\Form\Element\Textarea(
// 	'JMoreNavs',
// 	NULL,
// 	NULL,
// 	'导航栏更多链接（非必填）',
// 	'介绍：用于添加更多导航栏链接 <br />
// 	格式：跳转文字 || 跳转链接（中间使用两个竖杠分隔）<br />
// 	其他：一行一个，一行代表一个超链接 <br />
// 	例如：<br />
// 	百度一下 || https://baidu.com <br />
// 	腾讯视频 || https://v.qq.com
// 	'
// );
// $JMoreNavs->setAttribute('class', 'joe_content joe_global');
// $form->addInput($JMoreNavs);

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
$joe_custom_navs->setAttribute('class', 'joe_content joe_global');
$joe_custom_navs->setInputsAttribute('rows', '13');
$form->addInput($joe_custom_navs);

$joe_motto = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'joe_motto',
	NULL,
	NULL,
	'精彩一言',
	'随机显示中英文的文案，在此支持一言内容插入到文章页位置，同时可以使用侧边栏模块调用。<br>
	主题默认调用的文件为：' . JOE_ROOT . 'module/motto.txt <br>
	在此处填写后将使用您的自定义一言，格式：中文一言/&/英文一言'
);
$joe_motto->setAttribute('class', 'joe_content joe_global');
$form->addInput($joe_motto);

// $JArticle_Double_Column = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'JArticle_Double_Column',
// 	['off' => '关闭（默认）', 'on' => '开启'],
// 	'off',
// 	'文章双栏排版并隐藏侧边栏（仅在屏幕分辨率大于1400px下生效）'
// );
// $JArticle_Double_Column->setAttribute('class', 'joe_content joe_global');
// $form->addInput($JArticle_Double_Column->multiMode());

$JCustomFont = new \Typecho\Widget\Helper\Form\Element\Text(
	'JCustomFont',
	NULL,
	NULL,
	'自定义网站字体（非必填）',
	'介绍：用于修改全站字体，填写则使用引入的字体，不填写使用默认字体 <br>
	普通方式：直接填写字体URL链接（推荐使用woff2格式的字体，网页专用字体格式，占用空间小，加载速度更快，如果和本站不是同一个域名，则需要远程资源URL响应允许跨域的响应头规则） <br>
	跨域方式：字体CSS文件的URL链接 || CSS文件中font-family属性的值 <br>
	跨域方式示例：https://sfile.chatglm.cn/chatglm4/06088824-012c-4851-8f49-19d3cbb59acf.css || HarmonyOS Sans SC Medium <br>
	注意：跨域方式可能会导致网站卡顿掉帧，字体文件一般较大，建议使用CDN链接'
);
$JCustomFont->setAttribute('class', 'joe_content joe_global');
$form->addInput($JCustomFont);

$JCustomAvatarSource = new \Typecho\Widget\Helper\Form\Element\Text(
	'JCustomAvatarSource',
	NULL,
	NULL,
	'自定义头像源（非必填）',
	'介绍：用于修改全站头像源地址 <br>
		 例如：https://gravatar.ihuan.me/avatar/ <br>
		 其他：非必填，默认头像源为 https://gravatar.helingqi.com/wavatar/ <br>
		 注意：填写时，务必保证最后有一个/字符，否则不起作用！'
);
$JCustomAvatarSource->setAttribute('class', 'joe_content joe_global');
$form->addInput($JCustomAvatarSource);

$JForceBrowser = new \Typecho\Widget\Helper\Form\Element\Select(
	'JForceBrowser',
	array('off' => '关闭（默认）', 'on' => '开启'),
	'off',
	'微信、QQ打开跳转浏览器',
	'介绍：开启后，如果在微信里打开网站，则会提示复制链接到浏览器打开'
);
$JForceBrowser->setAttribute('class', 'joe_content joe_global');
$form->addInput($JForceBrowser->multiMode());
