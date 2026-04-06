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

?>
<link rel="stylesheet" href="<?php Helper::options()->themeUrl('assets/typecho/config/css/joe.config.css') ?>">
<script src="<?php $options->adminStaticUrl('js', 'jquery.js'); ?>"></script>
<script src="<?php Helper::options()->themeUrl('assets/plugin/autolog.js/3.0/autolog.js'); ?>"></script>
<script src="<?php Helper::options()->themeUrl('assets/plugin/layer/3.7.0/layer.js') ?>"></script>
<script>
	window.Joe = {
		title: `<?= trim(Helper::options()->title ?? '') ?>`,
		version: `<?= trim(JOE_VERSION) ?>`,
		logo: `<?= trim(Helper::options()->JLogo ?? '') ?>`,
		Favicon: `<?= trim(Helper::options()->joe_favicon ?? '') ?>`,
		BASE_API: `<?= joe_api_url() ?>/`
	}
</script>
<script src="<?php Helper::options()->themeUrl('assets/typecho/config/js/joe.config.js') ?>"></script>
<div class="joe_config">
	<div>
		<div class="joe_config__aside">
			<div class="logo">Joe再续前缘<?= JOE_VERSION ?></div>
			<ul class="tabs">
				<li class="item" data-current="joe_bulletin">最新公告</li>
				<li class="item" data-current="joe_global">全局设置</li>
				<li class="item" data-current="joe_header">顶栏设置</li>
				<li class="item" data-current="joe_image">图片设置</li>
				<li class="item" data-current="joe_post">文章设置</li>
				<li class="item" data-current="joe_aside">侧栏设置</li>
				<li class="item" data-current="joe_index">首页设置</li>
				<li class="item" data-current="joe_page">其他页面</li>
				<li class="item" data-current="joe_decoration">特效设置</li>
				<li class="item" data-current="joe_user">用户设置</li>
				<!-- <li class="item" data-current="joe_music">音乐设置</li> -->
				<li class="item" data-current="joe_friend">友链设置</li>
				<li class="item" data-current="joe_comment">评论设置</li>
				<!-- <li class="item" data-current="joe_statistic">统计设置</li> -->
				<li class="item" data-current="joe_message">消息推送</li>
				<li class="item" data-current="joe_footer">底栏设置</li>
				<li class="item" data-current="joe_pay">支付设置</li>
				<li class="item" data-current="joe_notice">弹窗通知</li>
				<a class="item" data-current="joe_code" href="<?= Helper::options()->rootUrl . __TYPECHO_ADMIN_DIR__ ?>options-theme.php?joe_code=true">插入代码</a>
				<li class="item" data-current="joe_other">其他设置</li>
			</ul>
			<div class="typecho-login" style="display: none;"></div>
			<div class="backup">
				<button onclick="Joe.update('active');">检测更新</button>
				<button onclick="Joe.backup('backup');">备份设置</button>
				<button onclick="Joe.backup('revert');">还原备份</button>
				<button onclick="Joe.backup('delete');">删除备份</button>
			</div>
			<script>
				document.querySelector('.operate>a:last-child').target = '_blank';
			</script>
		</div>
	</div>
	<div class="joe_config__notice">请求数据中...</div>
