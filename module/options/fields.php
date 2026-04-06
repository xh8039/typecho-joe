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

$keywords = new \Typecho\Widget\Helper\Form\Element\Text(
	'keywords',
	NULL,
	NULL,
	'SEO关键词',
	'注意：多个关键词使用英文逗号进行隔开 <br />
		 其他：如果不填写此项，则默认取文章标签，不占用数据库字段空间'
);
$layout->addItem($keywords);

$description = new \Typecho\Widget\Helper\Form\Element\Text(
	'description',
	NULL,
	NULL,
	'SEO描述语',
	'注意：SEO描述语不应当过长也不应当过少 <br />
		 其他：如果不填写此项，则默认截取文章片段，不占用数据库字段空间'
);
$layout->addItem($description);

$cover = new \Typecho\Widget\Helper\Form\Element\Text(
    'cover',
    NULL,
    NULL,
    '自定义封面图',
);
$layout->addItem($cover);

$thumb = new \Typecho\Widget\Helper\Form\Element\Text(
	'thumb',
	NULL,
	NULL,
	'自定义缩略图',
	'填写时：将会显示填写的文章缩略图<br>
	不填写时：<br>
	1、若文章有图片则取文章内图片<br>
	2、若文章无图片，并且外观设置里未填写·自定义缩略图·选项，则取模板自带图片<br>
	3、若文章无图片，并且外观设置里填写了·自定义缩略图·选项，则取自定义缩略图图片<br>
	注意：多个缩略图时使用 || 分割填写（仅在三图模式下生效）'
);
$layout->addItem($thumb);

$abstract = new \Typecho\Widget\Helper\Form\Element\Text(
	'abstract',
	NULL,
	NULL,
	'自定义摘要',
	'填写时：将会显示填写的摘要'
);
$layout->addItem($abstract);

// $video = new \Typecho\Widget\Helper\Form\Element\Textarea(
// 	'video',
// 	NULL,
// 	NULL,
// 	'M3U8或MP4地址',
// 	'<b style="color:#666;">该功能已废弃使用，后续版本将删除，请使用主题文章编辑器中的视频列表模块</b>
// 	<script>
// 	const fieldsVideo = document.querySelector(\'[name="fields[video]"]\');
// 	if (!fieldsVideo.value) fieldsVideo.style.display = "none";
// 	</script>'
// );
// $layout->addItem($video);

// $max_image_height = new \Typecho\Widget\Helper\Form\Element\Text(
// 	'max_image_height',
// 	NULL,
// 	NULL,
// 	'PC端图片极限高度',
// 	'介绍：用于设置当前页的图片最高高度 <br />
// 	 例如：40vh、300px、unset <br />
// 	 注意：填写 unset 即可使用自动高度 <br />
// 	 其他：如果不填写此项，则默认为40vh，不占用数据库字段空间'
// );
// $layout->addItem($max_image_height);

// $mode = new \Typecho\Widget\Helper\Form\Element\Select(
// 	'mode',
// 	['' => '默认模式（不占数据）', 'default' => '一图模式', 'single' => '大图模式', 'multiple' => '三图模式', 'none' => '无图模式'],
// 	NULL,
// 	'文章显示方式',
// 	'介绍：用于设置当前文章在首页和搜索页的显示方式 <br />
// 	 注意：独立页面该功能不会生效'
// );
// $layout->addItem($mode);

$hide = new \Typecho\Widget\Helper\Form\Element\Select(
	'hide',
	['' => '默认评论可见（不占数据）', 'comment' => '评论可见', 'pay' => '付费可见', 'login' => '登录可见'],
	NULL,
	'隐藏内容模式',
	'将要隐藏的内容用 {hide}我是隐藏的{/hide} 包裹'
);
$layout->addItem($hide);

$price = new \Typecho\Widget\Helper\Form\Element\Text(
	'price',
	NULL,
	NULL,
	'隐藏内容付费金额',
	'说明：金额设置为 0 则是免费资源<br><b style="color:#666;">注意：付费可见功能需先在文章编辑器内添加隐藏内容模块，并在 [主题设置=>支付设置] 处配置好您的支付信息后可用，否则不生效</b>'
);
$price->setAttribute('style', 'display:none');
$layout->addItem($price);

$pay_box_position = new \Typecho\Widget\Helper\Form\Element\Select(
	'pay_box_position',
	['' => '默认位置（不占数据）', 'top' => '文章内容顶部', 'bottom' => '文章内容底部', 'none' => '不显示'],
	NULL,
	'付费阅读模块显示位置',
	'在文章页面中购买模块的显示位置'
);
$layout->addItem($pay_box_position);

$pay_tag_background = new \Typecho\Widget\Helper\Form\Element\Select(
	'pay_tag_background',
	['' => '默认颜色（不占数据）', 'yellow' => '渐变黄', 'blue' => '渐变蓝', 'cyan' => '渐变青', 'green' => '渐变绿', 'purple' => '渐变紫', 'red' => '渐变红', 'pink' => '渐变粉', 'vip1' => '豪华VIP', 'vip2' => '轻奢VIP', 'none' => '不显示'],
	NULL,
	'付费阅读标签背景颜色',
	'<script>
			const payPriceInput = document.querySelector(\'input[name="fields[price]"]\').parentElement.parentElement.parentElement;
			const pay_box_position = document.querySelector(\'select[name="fields[pay_box_position]"]\').parentElement.parentElement.parentElement;
			const pay_tag_background = document.querySelector(\'select[name="fields[pay_tag_background]"]\').parentElement.parentElement.parentElement;
			if (document.querySelector(\'select[name="fields[hide]"]\').value === "pay") {
				pay_box_position.style.display = "table-row";
				pay_tag_background.style.display = "table-row";
				payPriceInput.style.display = "table-row";
			} else {
			 	pay_box_position.style.display = "none";
				pay_tag_background.style.display = "none";
				payPriceInput.style.display = "none";
			}
			document.querySelector(\'select[name="fields[hide]"]\').addEventListener("change", () => {
				if (document.querySelector(\'select[name="fields[hide]"]\').value === "pay") {
					pay_box_position.style.display = "table-row";
					pay_tag_background.style.display = "table-row";
					payPriceInput.style.display = "table-row";
				} else {
				 	pay_box_position.style.display = "none";
					pay_tag_background.style.display = "none";
					payPriceInput.style.display = "none";
				}
			});
		</script>'
);
$layout->addItem($pay_tag_background);

	// $global_advert = new \Typecho\Widget\Helper\Form\Element\Select(
	// 	'global_advert',
	// 	['' => '默认显示（不占数据）', 'display' => '显示', 'hide' => '隐藏'],
	// 	NULL,
	// 	'是否显示全局广告',
	// );
	// $layout->addItem($global_advert);

	// if (Helper::options()->JPost_Record_Detection == 'on') {
	// 	$baidu_push = new \Typecho\Widget\Helper\Form\Element\Select(
	// 		'baidu_push',
	// 		['' => '默认未推送（不占数据）', '0' => '未推送', '1' => '已推送'],
	// 		NULL,
	// 		'百度收录推送状态',
	// 	);
	// 	$layout->addItem($baidu_push);
	// }